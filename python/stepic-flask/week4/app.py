from flask import Flask, render_template, request
from flask_sqlalchemy import SQLAlchemy
import json, random
from flask_wtf import FlaskForm
from wtforms import StringField, SubmitField, RadioField
from wtforms.validators import InputRequired, Length
from flask_migrate import Migrate

# Читаем цели
with open('./json/goals.json', 'r') as f:
    goals = json.load(f)

# Читаем дни недели
with open('./json/week-loc.json', 'r') as f:
    week = json.load(f)

has_times = {'time_one': '1-2', 'time_two': '3-5', 'time_three': '5-7', 'time_four': '7-10'}

app = Flask(__name__)
app.secret_key = 'oleg_nizamov'
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///project.db'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)
migrate = Migrate(app, db)


class Teacher(db.Model):
    __tablename__ = 'teachers'
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(100), unique=True, nullable=False)
    about = db.Column(db.Text, nullable=False)
    rating = db.Column(db.Float, nullable=False)
    picture = db.Column(db.String(550), nullable=False)
    price = db.Column(db.Integer, nullable=False)
    goal = db.Column(db.String(350), nullable=False)
    free = db.Column(db.String(1000), nullable=False)
    reverse = db.relationship('Booking')


class Booking(db.Model):
    __tablename__ = 'booking'
    id = db.Column(db.Integer, primary_key=True)
    name = db.Column(db.String(100), nullable=False)
    phone = db.Column(db.String(15), nullable=False)
    day = db.Column(db.String(3), nullable=False)
    time = db.Column(db.Integer, nullable=False)
    teacher_id = db.Column(db.Integer, db.ForeignKey('teachers.id'))
    teacher = db.relationship('Teacher')


class Request(db.Model):
    __tablename__ = 'request'
    id = db.Column(db.Integer, primary_key=True)
    client_name = db.Column(db.String(100), nullable=False)
    client_goal = db.Column(db.String(100), nullable=False)
    client_time = db.Column(db.String(30), nullable=False)
    client_phone = db.Column(db.Integer, nullable=False)


class BookingForm(FlaskForm):
    name = StringField('Вас зовут', [InputRequired(), Length(min=3, max=100, message="от 3 до 100 символов")])
    phone = StringField('Ваш телефон', [InputRequired(), Length(min=4, max=15, message="от 4 до 15 цифр")])
    submit = SubmitField('Записаться на пробный урок')


# Модель на запрос преподователя
class RequestForm(FlaskForm):
    name = StringField('Вас зовут', [InputRequired(), Length(min=3, max=100, message="от 3 до 100 символов")])
    phone = StringField('Ваш телефон', [InputRequired(), Length(min=4, max=15, message="от 4 до 15 цифр")])
    goal = RadioField('Какая цель занятий?', default="work")
    limit_time = RadioField('Сколько времени есть?', default="time_two")
    submit = SubmitField('Найдите мне преподователя')


def db_teachers():
    with open('./json/teachers.json', 'r') as f:
        teachers = json.load(f)

    for teacher in teachers:
        create_teacher = Teacher(name=teacher['name'], about=teacher['about'], rating=teacher['rating'],
                                 picture=teacher['picture'],
                                 price=teacher['price'], goal=", ".join(teacher['goals']),
                                 free=str(json.dumps(teacher['free'])))
        db.session.add(create_teacher)
    db.session.commit()


# отключаем, т.к заполнение базы нужно только 1 раз
# db_teachers()


@app.route('/')
def render_main():
    teachers = db.session.query(Teacher).all()
    teacher = []
    for i in sorted(random.sample(range(1, 11), 6)):
        teacher.append(teachers[i])
    return render_template('index.html', goals=goals, teachers=teacher)


@app.route('/profiles/<int:profile_id>/')
def render_profile_id(profile_id):
    teacher_data = db.session.query(Teacher).get_or_404(profile_id)
    teacher = {"id": teacher_data.id, "name": teacher_data.name, "about": teacher_data.about,
               "rating": teacher_data.rating, "picture": teacher_data.picture,
               "price": teacher_data.price, "free": json.loads(teacher_data.free)}

    return render_template('profile.html', teacher=teacher, week=week, goals=goals)


@app.route('/goals/<goal_symbol>/')
def render_goals(goal_symbol):
    teachers_with_current_goal = db.session.query(Teacher).filter(Teacher.goal.like('%' + goal_symbol + '%')).order_by(
        Teacher.rating).all()

    for goal_id, value in goals.items():
        if goal_id == goal_symbol:
            goal_value = value

    return render_template('goal.html', goal=goal_value, teachers=teachers_with_current_goal)


@app.route('/request/', methods=['GET', 'POST'])
def render_request():
    form = RequestForm()

    # формируем массив целей для формы c помощью кортежа данных ключ-значение
    choice_goal = []
    for each_goal in goals:
        choice_goal.append(tuple([each_goal, goals[each_goal]]))

    # формируем массив свободного времени для формы c помощью кортежа данных ключ-значение
    choice_time = []
    for each_time in has_times:
        choice_time.append(tuple([each_time, has_times[each_time]]))

    # сохранение данных для передачи в форму
    form.goal.choices = choice_goal
    form.limit_time.choices = choice_time

    # На один роут вешаем запрос и обработки формы и вывод форму
    if form.validate_on_submit():
        select_order = Request(client_name=form.name.data, client_phone=form.phone.data, client_goal=form.goal.data,
                               client_time=form.limit_time.data)
        db.session.add(select_order)
        db.session.commit()
        return render_template('request_done.html', goal=form.goal.data, phone=form.phone.data,
                               time=form.limit_time.data, name=form.name.data)
    else:
        return render_template('request.html', form=form)


@app.route('/booking/<int:profile_id>/<day_week>/<time>', methods=['GET', 'POST'])
def render_booking(profile_id, day_week, time):
    form = BookingForm()

    teacher_data = db.session.query(Teacher).get_or_404(profile_id)
    teacher = {"id": teacher_data.id, "name": teacher_data.name, "about": teacher_data.about,
               "rating": teacher_data.rating, "picture": teacher_data.picture,
               "price": teacher_data.price, "free": json.loads(teacher_data.free)}

    for i in week:
        if day_week == i:
            client_day = week[i]

    if form.validate_on_submit():
        booking_from_user = Booking(name=form.name.data, phone=form.phone.data, day=day_week, time=time,
                                        teacher_id=profile_id)
        db.session.add(booking_from_user)
        db.session.commit()
        return render_template('booking_done.html', name=form.name.data, day=client_day, hour=time, phone=form.phone.data)
    else:
        return render_template('booking.html', form=form, teacher=teacher, day=day_week, hour=time, week=week)

if __name__ == '__main__':
    app.run()
