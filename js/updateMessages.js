const chatForm = document.getElementById('chat-form');
const chatMessages = document.querySelector('.chat-messages');
const roomName = document.getElementById('room-name');
const userList = document.getElementById('users');

// get username and room from URL
const userDetail = { username, room } = Qs.parse(location.search, {
    ignoreQueryPrefix: true
});


function formatMessage(userName, text, time) {
    return {
        userName,
        text,
        time
    }
};

// output message to DOM
function outputMessage(message) {
    const div = document.createElement('div');
    div.classList.add('message');
    div.innerHTML = `<p class="meta">${message.userName} <span>${message.time}</span></p>
    <p class="text">
        ${message.text}
    </p>`;
    document.querySelector('.chat-messages').appendChild(div);
}



// message submition
chatForm.addEventListener('submit', (e) => {
    e.preventDefault(); // prevents from submitting to a form
    
    // get message text value
    const text= e.target.elements.msg.value;
    // get time
    var today = new Date();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    // emitting a messsage to the server
    console.log(userDetail);
    const msg = formatMessage({username}, text, time);
    outputMessage(msg);

    // scroll down in message window
    chatMessages.scrollTop = chatMessages.scrollHeight;

    // clear message input after user presses enter
    e.target.elements.msg.value = '';
    e.target.elements.msg.focus();
});

// check if there are new posts every 2 seconds.
// if there are new posts, insert them at the bottom

// setInterval (updateMessages, 2000); // 2000 = 2 seconds.
// function updateMessages() {
//     var xhr = new XMLHttpRequest();

//     var posts = document.getElementsByTagName("div");
//     var max = 0;     
//     var numPosts = document.getElementsByClassName("post");    
//     console.log("number of posts: " + numPosts.length);
    

//     // find the most recent post_id
//     // will use this to check if there are newer posts
//     for (var i = 0; i < posts.length; i++) {
//         // id value will be a string so need to use function parseInt to convert to int value
//         var post_id = parseInt(posts[i].id);       
//         if (max < post_id) {
//             max = post_id;
//         }
//     }
//     var min = max;
//     // min post_id. use to delete last post if necessary
//     for (var i = 0; i < posts.length; i++) {
//         // id value will be a string so need to use function parseInt to convert to int value
//         var post_id = parseInt(posts[i].id);       
//         if (min > post_id) {
//             min = post_id;
//         }
//     }
    
//     console.log("most recent post_id is " + max);
//     console.log("oldest post_id is " + min);
    
//     xhr.onreadystatechange=function() {
//         if (xhr.readyState==4 && xhr.status==200) {
//             var result = xhr.responseText;
//             var responseObj = JSON.parse(result);
//             console.log("checking for new posts");            
            
//             // add new messages
//             const div = document.createElement('div');
//             div.classList.add('message');
//             div.innerHTML = `<p class="meta">${message.userName} <span>${message.time}</span></p>
//             <p class="text">
//             ${message.text}
//             </p>`;
//     document.querySelector('.chat-messages').appendChild(div);
//             // add new posts
//             // Should have made posts less complicated...            
//             for (var i = 0; i < responseObj.length; i++) {
//                 // parent node            
//                 var container = document.getElementById("container");
//                  // all the tags that need to be inserted for a single post
//                 var divPost = document.createElement("div"); 
//                 var divPostHeader = document.createElement("div");
//                 var spanUsername = document.createElement("span");
//                 var aUsername = document.createElement("a");
//                 var spanPostDate = document.createElement("span");
//                 var imgTag = document.createElement("img");
//                 var pTag = document.createElement("p"); 
//                 var divPostFooter = document.createElement("div"); 
//                 var spanLikeButton = document.createElement("span"); 
//                 var spanLikeCount = document.createElement("span"); 
//                 var spanDislikeButton = document.createElement("span"); 
//                 var spanDislikeCount = document.createElement("span"); 
//                 var aRepost = document.createElement("a");
//                 // new posts should be inserted at the top so have to use insertBefore()          
//                 divPost.className = "post";
//                 container.insertBefore(divPost, container.childNodes[0]);                
//                 divPostHeader.className = "post_header";
//                 divPost.appendChild(divPostHeader);
//                 divPost.id = responseObj[i].post_id;
//                 spanUsername.className = "user_name";
//                 divPostHeader.appendChild(spanUsername);                
//                 aUsername.href = "user_detail.php?user=" + responseObj[i].username;
//                 aUsername.innerHTML = responseObj[i].username;
//                 spanUsername.appendChild(aUsername);
//                 spanPostDate.className = "post_date";
//                 divPostHeader.appendChild(spanPostDate);
//                 spanPostDate.innerHTML = responseObj[i].post_date;
//                 imgTag.src = responseObj[i].avatar_URL;
//                 divPostHeader.appendChild(imgTag);
//                 pTag.innerHTML = responseObj[i].post;
//                 divPost.appendChild(pTag);
//                 divPostFooter.class = "post_footer";
//                 divPost.appendChild(divPostFooter);
//                 spanLikeButton.id = "likeButton_" + responseObj[i].post_id;
//                 spanLikeButton.className = "like material-icons";
//                 spanLikeButton.innerHTML = "arrow_circle_up";     
//                 // add event listener for new like button
//                 spanLikeButton.addEventListener("click", sendLike);
//                 divPostFooter.appendChild(spanLikeButton);
//                 spanLikeCount.id = "likeCount_" + responseObj[i].post_id;                
//                 spanLikeCount.innerHTML = responseObj[i].Likes;
//                 divPostFooter.appendChild(spanLikeCount);                
//                 spanDislikeButton.id = "dislikeButton_" + responseObj[i].post_id;
//                 spanDislikeButton.className = "dislike material-icons";
//                 spanDislikeButton.innerHTML = "arrow_circle_down";                
//                 // add event listener for new dislike button
//                 divPostFooter.appendChild(spanDislikeButton);
//                 spanDislikeButton.addEventListener("click", sendLike);
//                 spanDislikeCount.id = "dislikeCount_" + responseObj[i].post_id;
//                 spanDislikeCount.innerHTML = responseObj[i].Dislikes;
//                 divPostFooter.appendChild(spanDislikeCount);
//                 aRepost.href = "post_repost.php?pid=" + responseObj[i].post_id;
//                 aRepost.innerHTML = "repost";
//                 aRepost.style.cssFloat = "right";
//                 divPostFooter.appendChild(aRepost); 
//             }            
//             //if the number of posts exceeds 20, delete post
//             while (numPosts.length > 20) {
//                 var deleteThis = document.getElementById(min);               
//                 deleteThis.remove();
//                 min++;
//             }
//         }
//     }    
//     xhr.open("GET", "update_posts.php?pid=" + max, true);
//     xhr.send();
// }