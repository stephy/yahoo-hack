function(doc){
	var city, title;
	if(doc.title && doc.city){
		for(city in doc.city){
			city = doc.city;
			title = doc.title;
			emit(city, title);
		}
	}
}