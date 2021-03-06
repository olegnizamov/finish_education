"""empty message

Revision ID: 8e43ef3a8e74
Revises: 
Create Date: 2020-04-17 13:24:20.186639

"""
from alembic import op
import sqlalchemy as sa


# revision identifiers, used by Alembic.
revision = '8e43ef3a8e74'
down_revision = None
branch_labels = None
depends_on = None


def upgrade():
    # ### commands auto generated by Alembic - please adjust! ###
    op.create_table('request',
    sa.Column('id', sa.Integer(), nullable=False),
    sa.Column('client_name', sa.String(length=100), nullable=False),
    sa.Column('client_goal', sa.String(length=100), nullable=False),
    sa.Column('client_time', sa.String(length=30), nullable=False),
    sa.Column('client_phone', sa.Integer(), nullable=False),
    sa.PrimaryKeyConstraint('id')
    )
    op.create_table('teachers',
    sa.Column('id', sa.Integer(), nullable=False),
    sa.Column('name', sa.String(length=100), nullable=False),
    sa.Column('about', sa.Text(), nullable=False),
    sa.Column('rating', sa.Float(), nullable=False),
    sa.Column('picture', sa.String(length=550), nullable=False),
    sa.Column('price', sa.Integer(), nullable=False),
    sa.Column('goal', sa.String(length=350), nullable=False),
    sa.Column('free', sa.String(length=1000), nullable=False),
    sa.PrimaryKeyConstraint('id'),
    sa.UniqueConstraint('name')
    )
    op.create_table('booking',
    sa.Column('id', sa.Integer(), nullable=False),
    sa.Column('name', sa.String(length=100), nullable=False),
    sa.Column('phone', sa.String(length=15), nullable=False),
    sa.Column('day', sa.String(length=3), nullable=False),
    sa.Column('time', sa.Integer(), nullable=False),
    sa.Column('teacher_id', sa.Integer(), nullable=True),
    sa.ForeignKeyConstraint(['teacher_id'], ['teachers.id'], ),
    sa.PrimaryKeyConstraint('id')
    )
    # ### end Alembic commands ###


def downgrade():
    # ### commands auto generated by Alembic - please adjust! ###
    op.drop_table('booking')
    op.drop_table('teachers')
    op.drop_table('request')
    # ### end Alembic commands ###
