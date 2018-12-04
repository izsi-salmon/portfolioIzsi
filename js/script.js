
// DOM QUERIES

var projectThumbnails = document.getElementsByClassName('gallery-img');
var selectedProject;

// Modal Content
var modal = document.getElementById('modalDisplay');
var projectImg = document.getElementById('projectImg');
var projectTitle = document.getElementById('projectTitle');
var projectContext = document.getElementById('projectContext');
var projectDescription = document.getElementById('projectDescription');
var projectLink = document.getElementById('projectLink');

for (var i = 0; i < projectThumbnails.length; i++) {
  // projectThumbnails[i].addEventListener('click', function(){writeModal(i);}, false);
  setEventListener(i);
}

function setEventListener(idNo){
  projectThumbnails[idNo].addEventListener('click', function(){getProject(idNo);}, false);
}

function getProject(idNo){

  $.ajax({
      type: "get",
      url: "api/projectRequest.php",
      data: {
        table: table,
        id: idNo
      },
      success: function(dataFromApi){
        selectedProject = dataFromApi[0];
        // console.log(selectedProject);
        writeModal();
      },
      error: function(){
        console.log("Something went wrong, can't connect to API.");
      }

    });


}

function writeModal(){
  modal.style.display = 'flex';
  projectImg.setAttribute('src', './images/'+selectedProject.image0+'.jpg');
  projectTitle.innerHTML = selectedProject.title;
  projectContext.innerHTML = selectedProject.context;
  projectDescription.innerHTML = selectedProject.description;
  if(selectedProject.link){
    projectLink.innerHTML = 'Check out the site';
    projectLink.setAttribute('href', selectedProject.link);
  } else{
    projectLink.style.display = 'none';
  }
}
