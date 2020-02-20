var postId = null; //for updation
var posts = new Map();
var commentDetails = null;
const loadPosts = () => {
    $.ajax({
        url: url + 'getPost-comments.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    posts.set(response.Data[i].postId, response.Data[i]);
                }
                showSlider(posts);
            }
        }
    });
}
loadPosts();

var showSlider = posts => {
    $('#posts').dataTable().fnDestroy();
    $('.postData').empty();
    var tblData = '';

    posts.forEach((value, key) => {
        tblData += '<tr><td>'+value.custName+' </td>';
        tblData += '<td>'+value.contactNumber+' </td>';
        tblData += '<td>' + value.postTitle + '</td>';
        tblData += '<td>' + value.blogDate +','+value.postTime+ '</td>';
        tblData += '<td>' + value.numberOfcomments + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editPost(' + (key) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '</div></td></tr>';
      });
    $('.postData').html(tblData);
    $('#posts').dataTable({
        searching: true,
        retrieve: true,
        paging: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}


const editPost = Id => {
    Id = Id.toString();
    if (posts.has(Id)) {
        postId = Id;
        let comment = posts.get(Id);
        commentDetails = comment;
        $('.bloglist').hide();
        $('#newblog').load('add-post-comment.php');
    } else {
        alert('something goes wrong');
    }
}

function loadComments(commentDetails){
    var comment = '';
    $('#pTitle').html(commentDetails.postTitle);
    $('#pComment').html(commentDetails.postContent);
    $('#pCust').html(commentDetails.custName);
    var data = commentDetails.comments;
    comment+= '<div class="ui small comments" id="comment'+data[0].postId+'">';
    for(var i=0;i<data.length;i++){
        comment+= '<div class="comment">';
        comment+= '<a class="avatar">';
        comment+= '<img src="'+url+'customer/'+data[i].userId+'.jpg"></a>';
        comment+= '<div class="content">';
        comment+= '<a class="author">'+data[i].custName+'</a>';
        comment+= '<div class="metadata">';
        comment+= '<span class="date">'+data[i].comDate+' at '+data[i].comTime+'</span></div>';    
        comment+= '<div class="text">'+data[i].commentText+'</div>  </div> </div>';
    }
    comment += '</div>';
    comment+= '<form class="ui reply form">';
    comment+= '<div class="field">';
    comment+= '<textarea rows="4" id="directComment"></textarea></div>';
    comment+= '<button class="btn btn-success" type="button" onclick="addComment();">';
    comment+= ' Add Reply </button> </form>';
    $('#postComm').html(comment);
    var src = url + "posts/" + commentDetails.postId + ".jpg";
    // console.log(src);
   $('#prevImage').attr("src", src);
}

function goback() {
    $('#newblog').empty();
    $('#postComm').empty();
    $('.bloglist').show();
}
function addComment(){
    var details = {
        commentText : $('#directComment').val(),
        postId:postId
    };
    $.ajax({
        url: url + 'addCommentByAdmin.php',
        type: 'POST',
        dataType: 'json',
        data:details,
        success: function(response) {
            if (response.Data != null) {
               swal(response.Message);
               window.location.reload();
            }
        }
    });

}