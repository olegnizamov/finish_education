from flask import Flask
from config import Config
# from flask_migrate import Migrate
from flask_sqlalchemy import SQLAlchemy
from project.models import db, User, Meal, Category, Order, meals_orders_association

app = Flask(__name__)
app.config.from_object(Config)

# db.init_app(app)
db = SQLAlchemy(app)
# migrate = Migrate(app, db)

from project.views import *
