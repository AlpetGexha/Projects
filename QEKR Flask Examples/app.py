from flask import Flask, request
from markupsafe import escape

app = Flask(__name__)

temperatura = 0

@app.route('/')
def home():
    return 'App1'

@app.route('/Math')
def math():
    n1 = int(request.args.get('x'))
    n2 = int(request.args.get('y'))
    s = n1 + n2
    return str(s)

@app.route('/Perdoruesi/<usr>')
def show_user_profile(usr):
    return 'Perdoruesi eshte: %s' % escape(usr)

@app.route('/SmartHome/<room>')
def smart_home(room):
    komuniko_senzori()
    if room == "Koridori" :
        return 'Temperatura ne koridor eshte: ' + str(temperatura)
    elif room == "Kabineti" :
        return 'Temperatura ne dhome eshte: -10C'
    else :
        return 'Kjo dhome nuk ekziston'

def komuniko_senzori() :
    temperatura = 20

if __name__ == '__main__':
    app.run(debug=True)
    