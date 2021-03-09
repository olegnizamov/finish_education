from flask_wtf import FlaskForm
from wtforms import StringField, SubmitField
from wtforms.validators import InputRequired, Email, Length

class OrderForm(FlaskForm):
    name = StringField('Ваше имя', [InputRequired(message='Введите ваше Имя')])
    address = StringField('Адрес', [InputRequired(message='Введите ваш адресс')])
    email = StringField('Электропочта', [Email(message='Введите ваш email')])
    phone = StringField('Телефон', [InputRequired(message='Введите телефон')])
    submit = SubmitField('Оформить заказ')


class LoginForm(FlaskForm):
    email = StringField('Электропочта', [Email(message='Введите ваш email')])
    password = StringField('Пароль', [InputRequired(message='Введите пароль')])
    submit = SubmitField('Войти')