from flask import session, redirect, request, render_template
from werkzeug.security import check_password_hash
from sqlalchemy.sql.expression import func

from project import app, db
from project.models import Category, Meal, User
from project.forms import OrderForm, LoginForm

@app.route('/')
def home():
    category = db.session.query(Category).all()
    dish_dict = {}
    for cat in category:
        dish_dict[cat.id] = db.session.query(Meal).filter(Meal.category_id == cat.id).order_by(func.random()).limit(3)
    return render_template('index.html', category=category, dishes=dish_dict, count_cart=100)


@app.route('/addtocart/<id_dish>/')
def addtocart(id_dish):
    cart_list = session.get('dish', [])
    cart_list.append(id_dish)
    session['dish'] = cart_list
    return redirect('/cart/')


@app.route('/cart/', methods=['GET', 'POST'])
def cart():
    form = OrderForm()
    cart_list_id = session.get('dish', [])
    dish_list = []
    for dish_id in cart_list_id:
        dish_list.append(db.session.query(Meal).get(dish_id))
    flag_del = session.get('flag_dish_del', False)
    if flag_del:
        session['flag_dish_del'] = False
    flag_login = session.get('login', False)
    if form.validate_on_submit():
        return redirect('/ordered/')
    client_data = [session.get('client_name', ''), session.get('client_address', ''),
                        session.get('client_email', ''), session.get('client_phone', '')]
    return render_template('cart.html', count_cart=100, form=form, dish_list=dish_list, flag_del=flag_del,
                           flag_login=flag_login, client_data=client_data)

@app.route('/cart/del/<dish_id>')
def cart_del_dish(dish_id):
    cart_list = session.get('dish')
    cart_list.remove(dish_id)
    session['dish'] = cart_list
    session['flag_dish_del'] = True
    return redirect('/cart/')

@app.route('/account/')
def account():
    return render_template('account.html')


@app.route('/login/', methods=['GET', 'POST'])
def login():
    form = LoginForm()
    if form.validate_on_submit():
        email = form.email.data
        password = form.password.data
        client = db.session.query(User).filter(User.email == email).first()
        if check_password_hash(client.password, password):
            session['client_id'] = client.id
            session['client_name'] = client.name
            session['client_email'] = client.email
            session['client_address'] = client.address
            session['client_phone'] = client.phone
            return redirect('/account/')
        else:
            return render_template('login.html', form=form, message='Неверный логин или пароль')
    return render_template('login.html', form=form)


@app.route('/logout/')
def logout():
    return render_template('login.html')


@app.route('/register/')
def register():
    return render_template('register.html')


@app.route('/ordered/')
def ordered():
    return render_template('ordered.html')