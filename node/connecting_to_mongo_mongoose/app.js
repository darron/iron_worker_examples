// load modules needed for script to run.
var mongoose = require('mongoose');

// variables specific to your ironworker environment
var iron_helper = require('node_helper');
var params = iron_helper.params;
var task_id = iron_helper.task_id;
var config = iron_helper.config;
console.log(mongoose)

// establish a connection to your database 
mongoose.connect('mongodb://localhost/test');

// load schema/model, here I'm hardcoding a model

// define a schema
var Schema = mongoose.Schema
  , ObjectId = Schema.ObjectId;

var personSchema = new Schema({
  name: {
    first: String,
    last: String
  }
});

// compile our model
var Person = mongoose.model('Person', personSchema);

// execute your query
Person.findOne({ 'name.last': 'White' }, 'name', function (err, person) {
  if (err) return handleError(err);
  console.log('%s %s', person.name.first, person.name.last)
})

// you can make the app/models folder accessible to your worker in the .worker file
// include and upload the directory by adding the following to mean.worker
// dir "app/models"