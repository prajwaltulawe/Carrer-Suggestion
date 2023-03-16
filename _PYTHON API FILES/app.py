import pickle
from flask import Flask, request
app = Flask(__name__)

@app.route('/result/',methods = ['POST', 'GET'])
def result():
   if request.method == 'POST':
      result = request.form
      print(result)
      res = result.to_dict(flat=True)      
      resArr = res.values()
      arr = ([value for value in resArr])
      reqArr = [[int(x) for x in arr]]
      model = pickle.load(open("careerPredModel.pkl", 'rb'))
      predictions = model.predict(reqArr)
      return predictions[0]