
// DOM QUERIES

var projectThumbnails = document.getElementsByClassName('gallery-img');
var selectedProject;

// Modal Content
var modal = document.getElementById('modalDisplay');
var modalContent = document.getElementById('modalContent');
var closeIcon = document.getElementById('closeTrigger');
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
        writeModal();
      },
      error: function(){
        console.log("Something went wrong, can't connect to API.");
      }

    });


}

function writeModal(){
  modal.style.backgroundColor = 'rgba(0,0,0,0.8)';
  modal.style.pointerEvents = 'all';
  modalContent.style.opacity = '1';
  closeIcon.style.opacity = '1';
  document.body.style.overflowY = 'hidden';
  projectImg.setAttribute('src', './images/'+selectedProject.image0+'.jpg');
  projectTitle.innerHTML = selectedProject.title;
  projectContext.innerHTML = selectedProject.context;
  projectDescription.innerHTML = selectedProject.description;
  if(selectedProject.link){
    projectLink.innerHTML = 'Check out the site';
    projectLink.style.display = 'block';
    projectLink.setAttribute('href', selectedProject.link);
  } else{
    projectLink.style.display = 'none';
  }
}

function closeModal(){
  modal.style.backgroundColor = 'rgba(0,0,0,0)';
  modal.style.pointerEvents = 'none';
  modalContent.style.opacity = '0';
  closeIcon.style.opacity = '0';
  document.body.style.overflowY = 'scroll';
}

$(modal).click(function(event) {
    if (!$(event.target).closest(modalContent).length){
      closeModal();
    }
});
