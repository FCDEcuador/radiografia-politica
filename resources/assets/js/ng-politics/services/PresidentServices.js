var services = require('../services').services;

services.service('President', function(){
  var presidents = [
    {
      president: {
        id: 1,
        name: "Lenin",
        lastname: "Moreno",
        picture: "lenin-moreno.jpg"
      },
      vicepresident:{
        id:2,
        name: "Jorge",
        lastname: "Glas",
        picture: "jorge-glass.jpg"
      }
    },
    {
      president: {
        id: 1,
        name: "Cintia",
        lastname: "Viteri",
        picture: "lenin-moreno.jpg"
      },
      vicepresident:{
        id:2,
        name: "No",
        lastname: "Si",
        picture: "jorge-glass.jpg"
      }
    }
  ];

  return {
    all: function(){
      return presidents;
    }
  };

});
