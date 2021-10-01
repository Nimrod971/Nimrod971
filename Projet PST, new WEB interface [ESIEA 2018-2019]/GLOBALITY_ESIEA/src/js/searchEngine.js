function searchEngine() {
  var input, filter, listProjects, project, titleProject, yearProject, category, follower, projectManager, member2, member3, member4, member5, i;
  input = document.getElementById("searchEngineInput");
  filter = input.value.toUpperCase();
  listProjects = document.getElementById("list-projects");
  project = listProjects.getElementsByClassName("project");

  for (i = 0; i < project.length; i++) {
    titleProject   = project[i].getElementsByClassName("titleProject")[0];
    yearProject    = project[i].getElementsByClassName("yearProject")[0];
    category       = project[i].getElementsByClassName("category")[0];
    follower       = project[i].getElementsByClassName("member")[0];
    projectManager = project[i].getElementsByClassName("member")[1];
    member2        = project[i].getElementsByClassName("member")[2];
    member3        = project[i].getElementsByClassName("member")[3];
    member4        = project[i].getElementsByClassName("member")[4];
    member5        = project[i].getElementsByClassName("member")[5];
    if (titleProject.innerHTML.toUpperCase().indexOf(filter) > -1 || yearProject.innerHTML.toUpperCase().indexOf(filter) > -1 || category.innerHTML.toUpperCase().indexOf(filter) > -1 || follower.innerHTML.toUpperCase().indexOf(filter) > -1 || projectManager.innerHTML.toUpperCase().indexOf(filter) > -1 || member2.innerHTML.toUpperCase().indexOf(filter) > -1 || member3.innerHTML.toUpperCase().indexOf(filter) > -1 || member4.innerHTML.toUpperCase().indexOf(filter) > -1 || member5.innerHTML.toUpperCase().indexOf(filter) > -1) {
      project[i].style.display = "";
    } else {
      project[i].style.display = "none";
    }
  }
}
