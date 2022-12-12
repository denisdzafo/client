import http from "./http-common";

class endPoints {
	  getCities(page) {
	    return http.get(`/city/get?page=${page}`);
	  }

	  createCity(data) {
	    return http.post("/city/create", data);
	  }

	  deleteCity(data) {
	    return http.post("/city/delete", data);
	  }

	  editCity(data) {
	    return http.post("/city/edit", data);
	  }

	  getCountries(page) {
	    return http.get(`/country/get?page=${page}`);
	  }

	  createCountry(data) {
	    return http.post("/country/create", data);
	  }

	  deleteCountry(data) {
	    return http.post("/country/delete", data);
	  }

	  editCountry(data) {
	    return http.post("/country/edit", data);
	  }

	  getIndustries(page) {
	    return http.get(`/industry/get?page=${page}`);
	  }

	  createIndustry(data) {
	    return http.post("/industry/create", data);
	  }

	  deleteIndustry(data) {
	    return http.post("/industry/delete", data);
	  }

	  editIndustry(data) {
	    return http.post("/industry/edit", data);
	  }

	  getContactTypes(page) {
	    return http.get(`/contact-type/get?page=${page}`);
	  }

	  createContactType(data) {
	    return http.post("/contact-type/create", data);
	  }

	  deleteContactType(data) {
	    return http.post("/contact-type/delete", data);
	  }

	  editContactType(data) {
	    return http.post("/contact-type/edit", data);
	  }

	  getClients(data) {
	    return http.post("/client/get", data);
	  }

	  createClient(data) {
	    return http.post("/client/create", data);
	  }

	  deleteClient(data) {
	    return http.post("/client/delete", data);
	  }

	  editClient(data) {
	    return http.post("/client/edit", data);
	  }


}

export default new endPoints();