import turtle

col = ['yellow', 'red', 'green', 'orange', 'blue', 'white']

t = turtle.Turtle()
screen = turtle.Screen()
screen.bgcolor('black')
t.speed(100)

for i in range(300):
    t.color(col[i % 6])
    t.forward(i * 4)
    t.left(150)
    t.width(2)
