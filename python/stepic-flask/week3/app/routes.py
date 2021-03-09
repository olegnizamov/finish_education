# coding: utf-8

from flask import Flask, render_template, request
from app import app
import json, random


with open('goals.json', 'r') as f:
    goals = json.load(f)

with open('teachers.json', 'r') as f:
    teachers = json.load(f)

with open('week-loc.json', 'r') as f:
    week = json.load(f)

@app.route('/profiles/<int:profile_id>/')
def render_profile_id(profile_id):
    teacher = {}
    for i in range(len(teachers)):
        if profile_id == teachers[i]['id']:
            teacher = teachers[i]
    return render_template('profile.html', teacher=teacher, week=week, goals=goals)


@app.route('/booking/<int:profile_id>/<day_week>/<time>')
def render_booking(profile_id, day_week, time):
    teacher = {}
    for i in range(len(teachers)):
        if profile_id == teachers[i]['id']:
            teacher = teachers[i]
    return render_template('booking.html', teacher=teacher, day=day_week, hour=time, week=week)


@app.route('/booking_done/', methods=['POST'])
def render_booking_done():
    booking = {'client_day': request.form.get('clientWeekday'),
               'client_time': request.form.get('clientTime'),
               'teacher_id': request.form.get('clientTeacher'),
               'client_name': request.form.get('clientName'),
               'client_phone': request.form.get('clientPhone')}

    with open('booking.json', 'a', encoding='utf-8') as f:
        json.dump(booking, f)

    client_day = ''
    for i in week:
        if booking['client_day'] == i:
            client_day = week[i]

    return render_template('booking_done.html', name=booking['client_name'], day=client_day,
                           hour=booking['client_time'], phone=booking['client_phone'])


@app.route('/request/')
def render_request():
    return render_template('request.html')


@app.route('/request_done/', methods=['POST'])
def render_request_done():
    requests = {'client_goal': request.form.get('goal'),
                'client_time': request.form.get('time'),
                'client_name': request.form.get('request_name'),
                'client_phone': request.form.get('request_phone')}

    with open('request.json', 'a', encoding='utf-8') as f:
        json.dump(requests, f)

    return render_template('request_done.html', goal=requests['client_goal'], phone=requests['client_phone'],
                           time=requests['client_time'], name=requests['client_name'])

@app.route('/')
def render_main():
    teacher = []
    for i in sorted(random.sample(range(1, 11), 6)):
        teacher.append(teachers[i])
    return render_template('index.html', goals=goals, teachers=teacher)

@app.route('/goals/<goal_symbol>/')
def render_goals(goal_symbol):
    teachers_with_current_goal = []

    for teacher in teachers:
        for teacher_goal in teacher['goals']:
            if teacher_goal == goal_symbol:
                teachers_with_current_goal.append(teacher)


    for goal_id, value in goals.items():
        if goal_id == goal_symbol:
            goal_value = value

    return render_template('goal.html', goal=goal_value, teachers=teachers_with_current_goal)


@app.route('/profiles/')
def render_profiles():
    return render_template('profiles.html', teachers=teachers, week=week, goals=goals)

