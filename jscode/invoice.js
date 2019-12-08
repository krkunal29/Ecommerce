$("#customerName").select2();
// const data = {
//     userId: $('#userId').val(),
//     roleId: $('#roleId').val()
// };
// var blogmainId = null; //for updation
// var details = {};
// var blogList = new Map();
// const loadblogs = () => {
//     $.ajax({
//         url: url + 'getAllBlogs.php',
//         type: 'POST',
//         dataType: 'json',
//         // data: data,
//         success: function(response) {
//             if (response.Data != null) {
//                 const count = response.Data.length;
//                 for (var i = 0; i < count; i++) {
//                     blogList.set(response.Data[i].blogId, response.Data[i]);
//                 }
//                 showblog(blogList);
//             }
//         }
//     });
// }
console.log(productList);
console.log(taxList);
console.log(unitList);
//
//
// const showblog = blogList => {
//   // console.log(blogList);
//     $('#blogs').dataTable().fnDestroy();
//     $('.blogData').empty();
//     var tblData = '';
//     for (let k of blogList.keys()) {
//         let blogs = blogList.get(k);
//         tblData += '<tr><td>' + blogs.blogTitle + '</td>';
//         tblData += '<td>' + blogs.category + '</td>';
//         tblData += '<td>' + blogs.blogStatus + '</td>';
//         tblData += '<td><div class="table-actions">';
//         tblData += '<a href="#" onclick="editBlog(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
//         tblData += '<a href="#" class="list-delete" onclick="removeBlog(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
//         tblData += '</div></td></tr>';
//     }
//     $('.blogData').html(tblData);
//     $('#blogs').dataTable({
//         searching: true,
//         retrieve: true,
//         paging: true,
//         bPaginate: $('tbody tr').length > 10,
//         order: [],
//         columnDefs: [{ orderable: false, targets: [0, 1, 2, 3] }],
//         dom: 'Bfrtip',
//         buttons: ['copy', 'csv', 'excel', 'pdf'],
//         destroy: true
//     });
// }
// loadblogs();
//
// const editBlog = blogId => {
//     blogId = blogId.toString();
//     if (blogList.has(blogId)) {
//         $('.bloglist').hide();
//         $('#newblog').load('edit_blog.php');
//         const vendor = blogList.get(blogId);
//         blogmainId = blogId;
//         details = vendor;
//     } else {
//         alert('something goes wrong');
//     }
// }
//
// const removeBlog = blogId => {
//     blogId = blogId.toString();
//
//     $.ajax({
//         url:url+'deleteBlogs.php',
//         type:'POST',
//         data:{
//           blogId:blogId
//         },
//         dataType:'json',
//         success:function(response){
//
//           if(response.Responsecode==200){
//             blogList.delete(blogId.toString());
//             showblog(blogList);
//             goback();
//           }
//           else{
//             // alert(response.Message);
//               alert("Already Used Can't Delete");
//           }
//         }
//     });
// }
//
// function addBlog() {
//     $('.bloglist').hide();
//     $('#newblog').load('add_blog.php');
// }
//
// function goback() {
//     $('#newblog').empty();
//     $('.bloglist').show();
// }
