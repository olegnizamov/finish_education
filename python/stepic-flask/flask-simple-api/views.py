from flask import request, jsonify

from app import app
from models import db, Volunteer, District, Street, Request


@app.route('/districts/', methods=['GET'])
def api_districts_list():
    # выбираем весь список District
    districts = District.query
    return jsonify([district.as_json for district in districts]), 200


@app.route('/streets/', methods=['GET'])
def api_streets_list():
    district_id = request.args.get('district')
    streets = db.session.query(Street)
    if district_id:
        streets = streets.join(Street.districts).filter(District.id == int(district_id))
    return jsonify([street.as_json for street in streets]), 200


@app.route('/volunteers/', methods=['GET'])
def api_volunteers_list():
    streets = request.args.get('streets')
    volunteers = db.session.query(Volunteer)
    if streets:
        volunteers = volunteers.join(Volunteer.streets).filter(Street.id == streets)
    return jsonify([volunteer.as_json for volunteer in volunteers.order_by(Volunteer.name)]), 200


@app.route('/helpme/', methods=['POST'])
def api_post_help_me():
    data = request.get_json()
    if not data:
        return jsonify({'status': 'failed'}), 400

    try:
        help_request = Request(
            district_id=data['district'],
            street_id=data['street'],
            volunteer_id=data['volunteer'],
            address=data['address'],
            client_name=data['name'],
            client_surname=data['name'],
            client_phone=data['phone'],
            text=data['text']
        )
        db.session.add(help_request)
        db.session.commit()
    except KeyError:
        return jsonify({'status': 'failed'}), 400
    except Exception:
        return jsonify({'status': 'failed'}), 500

    return jsonify({'status': 'success', 'request_id': help_request.id}), 201
