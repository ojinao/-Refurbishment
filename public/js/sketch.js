var input = '';
const searchUrl = 'https://ja.wikipedia.org/w/api.php?action=query&format=json&list=backlinks&bllimit=50&bltitle='

function setup() {
  noCanvas();
  input = select('#input');
  input.changed(search);
}

function search() {
  //  console.log(input.value());
  var url = searchUrl + input.value()
  loadJSON(url, show,'jsonp');
}

function show(data) {
  // console.log(data);
  var Links = data.query.backlinks;
  Links.forEach(Link => {
  createDiv(Link.title).style('margin-left', '200px');
  });
}