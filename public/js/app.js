
/**
 * Ajax function for Edit post functionality
*/
function editPost(id, title, body) {

var editpostId = $('#edit_postId').val(id);
var editpostTitle = $('#edit_postTitle').val(title);
var editpostBody = $('#edit_postBody').val(body);

$('#editPostModal').modal('show');

}

    /**
     * Ajax function for Delete post functionality
 */
function delPost(id) {

    var delpostId = $('#del_postId').val(id);
    $('#delPostModal').modal('show');
}

/**
 * Ajax function for Edit comment functionality
*/
function editComment(id, body) {

    var commentBody = $('#body_input').val(body);
    var commentId = $('#id_input').val(id);

    $('#editCommentModel').modal('show');
}

/**
 * Ajax function for Delete comment functionality
*/
function delComment(id) {

    var delcommentId = $('#del_id').val(id);
    $('#delCommentModal').modal('show');
}
