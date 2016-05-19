var docReady = setInterval(function() {

	if (document.readyState !== 'complete') {
		return;
	}

	clearInterval(docReady);
	var commentSub = document.getElementsByClassName('btn')[0];
	commentSub.addEventListener('click', startComment);


},100);

function startComment(event) {
	event.preventDefault();
	var body = document.getElementById('body').value;
	if (body.length == 0) {
		alert('Please enter a valid comment');
		return;
	}
	var postId= document.getElementsByTagName('article')[0].dataset['id'];
	ajax("POST", "/blog/" + postId +"&" + "frontend", 'body=' + body, endComment, [event]);
}

function endComment(params, success, responseObj) {
	var addedComment = document.getElementsByClassName('added-comment')[0];
	var box = document.getElementsByClassName('box')[0];
	addedComment.style.display ="block";
	addedComment.children[0].style.background = "green"
	setTimeout(function(){
		addedComment.children[0].style.background = "initial"
	},300);
	addedComment.children[0].children[0].innerText = responseObj['username'] + " posted at "
	+ responseObj['new_comment'].created_at + " : " + responseObj['new_comment'].body;
	addedComment.className ="single-comment text-center";
	var newAddedComment = document.createElement('div');
	newAddedComment.className = 'added-comment text-center';
	var commentBody = document.createElement('div');
	commentBody.className = "comment-body text-left";
	var newLine = document.createElement('li');
	newAddedComment.appendChild(commentBody);
	commentBody.appendChild(newLine);
	box.appendChild(newAddedComment);
	body.value = "";

}


function ajax(method, url, params, callback, callbackParams) {
	var http;

  if (window.XMLHttpRequest) {
      http = new XMLHttpRequest();
  }

  http.onreadystatechange = function() {

      if (http.readyState == XMLHttpRequest.DONE ) {

          if(http.status == 200){
              var obj = JSON.parse(http.responseText);
              callback(callbackParams, true, obj);
          } else if(http.status == 400) {
              alert("Comment could not be saved. Please try again!");
              callback(callbackParams, false);
          } else {
              var obj = JSON.parse(http.responseText);

              if (obj.message) {
                  alert(obj.message);
              } else {
                  alert("Please check comment");
              }
            	callback(callbackParams, false);
          }
      }
  }

  http.open(method, baseUrl + url, true);
  http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  http.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
  http.send(params + "&_token=" + token);
}
