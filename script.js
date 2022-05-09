function commentaires(id) {
    let comm = document.querySelector("#commentaire-" + id);
	if (comm.style.display === "none") {
    	comm.style.display = "block";
    } else {
        comm.style.display = "none";
    }
}
function toggleCommentForm() {
	let comm = document.querySelector("#comment-form");
	if (comm.style.display === "none") {
    	comm.style.display = "block";
    } else {
        comm.style.display = "none";
    }
}