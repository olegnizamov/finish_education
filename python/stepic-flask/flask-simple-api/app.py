from flask import Flask
from flask_migrate import Migrate

from config import Config
from models import db

app = Flask(__name__)
app.config.from_object(Config)

db.init_app(app)
migrate = Migrate(app, db)

from views import api_post_help_me, api_streets_list, api_districts_list, api_volunteers_list

if __name__ == '__main__':
    app.run()
