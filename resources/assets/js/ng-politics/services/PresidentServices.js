var services = require('../services').services;

services.service('President', function($http){
  var server = "http://localhost:8000";
  var presidents = [
    {
      president: {
        id: 1,
        name: "Lenin",
        lastname: "Moreno",
        picture: "lenin-200.jpg"
      },
      vicepresident:{
        id:2,
        name: "Jorge",
        lastname: "Glas",
        picture: "glass-200.jpg"
      },
      partido:{
        id:1,
        name: "Alianza",
        icon: "35-pais.png"
      }
    },
    {
      president: {
        id: 1,
        name: "Cinthya",
        lastname: "Viteri",
        picture: "cinthya-200.jpg"
      },
      vicepresident:{
        id:2,
        name: "Mauricio",
        lastname: "Pozo",
        picture: "mauricio-200.jpg"
      },
      partido:{
        id:1,
        name: "PSC",
        icon: "psc.png"
      }
    },
    {
      president: {
        id: 1,
        name: "Guillermo",
        lastname: "Lasso",
        picture: "lasso-200.jpg"
      },
      vicepresident:{
        id:2,
        name: "Andrés",
        lastname: "Paez",
        picture: "paez-200.jpg"
      },
      partido:{
        id:1,
        name: "CREO",
        icon: "creo.png"
      }
    },
    {
      president: {
        id: 1,
        name: "Paco",
        lastname: "Moncayo",
        picture: "psco-200.jpg"
      },
      vicepresident:{
        id:2,
        name: "M.",
        lastname: "Bustamante",
        picture: "monserrat-200.jpg"
      },
      partido:{
        id:1,
        name: "ID",
        icon: "izquierda-democratica.png"
      }
    },
    {
      president: {
        id: 1,
        name: "Abdalá",
        lastname: "Bucaram",
        picture: "dalo-200.jpg"
      },
      vicepresident:{
        id:2,
        name: "Ramiro",
        lastname: "Aguilar",
        picture: "ramiro-200.jpg"
      },
        partido:{
          id:1,
          name: "Fuerza EC",
          icon: "fuerza-ecuador.png"
        }
    },
    {
      president: {
        id: 1,
        name: "P.",
        lastname: "Zuquilanda",
        picture: "zuquilanda-200.jpg"
      },
      vicepresident:{
        id:2,
        name: "Jhonnie",
        lastname: "Jorgge",
        picture: "jhonnie-200.jpg"
      },
      partido:{
        id:1,
        name: "PSP3",
        icon: "psp3.png"
      }
    },
    {
      president: {
        id: 1,
        name: "Ivan",
        lastname: "Espinel",
        picture: "ivan-200.jpg"
      },
      vicepresident:{
        id:2,
        name: "Doris",
        lastname: "Quiroz",
        picture: "doris-200.jpg"
      },
      partido:{
        id:1,
        name: "Fuerza",
        icon: "fuerza.png"
      }
    },
    {
      president: {
        id: 1,
        name: "W.",
        lastname: "Pesántez",
        picture: "pesantez-200.jpg"
      },
      vicepresident:{
        id:2,
        name: "Alex",
        lastname: "Alcivar",
        picture: "alcivar-200.jpg"
      },
      partido:{
        id:1,
        name: "Union",
        icon: "19.png"
      }
    }
  ];

  return {
    all: function(){
      return $http.get(server + '/api/binomials').then(function(res){
        return res.data;
      });
    }
  };

});
