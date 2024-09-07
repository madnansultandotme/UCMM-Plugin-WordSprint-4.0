// jQuery(document).ready(function($) {
//     // Toggle the page selector when the "Maintain Pages" button is clicked
//     $('#maintain-pages').on('click', function(e) {
//         e.preventDefault(); // Prevent default behavior of the button
//         $('#page-selector').toggle();
//         $('#post-selector').hide(); // Hide the post selector if it's open
//     });

//     // Toggle the post selector when the "Maintain Posts" button is clicked
//     $('#maintain-posts').on('click', function(e) {
//         e.preventDefault(); // Prevent default behavior of the button
//         $('#post-selector').toggle();
//         $('#page-selector').hide(); // Hide the page selector if it's open
//     });

//     // Handle the maintenance mode for the selected page
//     $('#set-maintain-page').on('click', function(e) {
//         e.preventDefault();
//         let selectedPage = $('#page-selector-dropdown').val();
//         if (selectedPage) {
//             $.post(ucmm_admin.ajax_url, {
//                 action: 'ucmm_save_maintenance',
//                 page_id: selectedPage,
//                 _wpnonce: ucmm_admin.nonce
//             }, function(response) {
//                 alert('Page set to maintenance mode.');
//                 location.reload(); // Reload the page to reflect the changes
//             });
//         }
//     });

//     // Handle the maintenance mode for the selected post
//     $('#set-maintain-post').on('click', function(e) {
//         e.preventDefault();
//         let selectedPost = $('#post-selector-dropdown').val();
//         if (selectedPost) {
//             $.post(ucmm_admin.ajax_url, {
//                 action: 'ucmm_save_maintenance',
//                 post_id: selectedPost,
//                 _wpnonce: ucmm_admin.nonce
//             }, function(response) {
//                 alert('Post set to maintenance mode.');
//                 location.reload(); // Reload the page to reflect the changes
//             });
//         }
//     });
// });
