//get the input and UL list

var index={
    
    
    init: function() {
            //adminArea.newCliForm();
            //adminArea.newCarForm();
            //adminArea.newParkForm();
            
            index.list();
        },
    
  list: function (){  

var input = document.getElementById('foto');
var list = document.getElementById('fileList');

//empty list for now...
while (list.hasChildNodes()) {
	list.removeChild(ul.firstChild);
}

//for every file...
for (var x = 0; x < input.files.length; x++) {
	//add to list
	var li = document.createElement('li');
	li.innerHTML = 'File ' + (x + 1) + ':  ' + input.files[x].name;
	list.append(li);
}

  }

};
Index.init();