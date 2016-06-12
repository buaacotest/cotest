function replyPlaceholderFocus(textarea){
	$($(textarea).parents(".comment")[0]).find(".reply-btn").addClass("reply-btn-active")
	$(".reply-reply-placeholder").hide();
	console.log("heh")
	$(".reply-reply").attr("toggle","1");
}
function replyPlaceholderBlur(textarea){
	$($(textarea).parents(".comment")[0]).find(".reply-btn").removeClass("reply-btn-active")
}
function replyClick(replyBtn){
	if($(replyBtn).attr("toggle")=='0'){
		

		$($(replyBtn).parents(".comment")[0]).find(".reply-panel").hide();
		$(replyBtn).attr("toggle","1");

	}else{
		
		$(".reply-panel").hide();
		$(".reply").attr("toggle","1");
		$($(replyBtn).parents(".comment")[0]).find(".reply-panel").show();
		$(replyBtn).attr("toggle","0");
	}
}
function replyReplyClick(replyReplyBtn){

	if($(replyReplyBtn).attr("toggle")=='0'){
		$($(replyReplyBtn).parents(".reply-item")[0]).find(".reply-reply-placeholder").hide();
		$(replyReplyBtn).attr("toggle","1");

	}else{
		$(".reply-reply-placeholder").hide();
		$(".reply-reply").attr("toggle","1");
		$($(replyReplyBtn).parents(".reply-item")[0]).find(".reply-reply-placeholder").show();
		$(replyReplyBtn).attr("toggle","0");
	}
	
}
function fetchComments(product,comments,page){
	console.log(product);
	$.post("commentList.php",{id_product:product,commentPage:page},function(data){
					console.log(data)
					$(comments).html(data);
	})
}
function addComment(pro,replyer,id_parent,comment_btn,page){
	var commentArea=$(comment_btn).parent().find("textarea");
	var content=$(commentArea).val();
	var comments=$(".comments")
	$.post("comment.php",{product:pro,replyer:replyer,cotent:content,id_parent:id_parent},function(result){
			if(result=="success"){
				fetchComments(pro,comments,page);
				$(commentArea).val("");
			}else{

			}
			
			
	})
}
function reply(reply_btn,product,comment_id,replyer){
	console.log(replyer);
    	addComment(product,comment_id,replyer,$(reply_btn).parent().find("textarea"),$(".comments"));
	}
	function comment(comment_btn,product){
		addComment(product,replyer,id_parent,comments,page)
	}

function dislike(dislikeTag,id_comment){
	var dislike_icon=$(dislikeTag).find(".dislike-icon")
	var dislike_flag=$(dislikeTag).attr("dislike");
	$.post("comment.php",{id_comment:id_comment,dislike:dislike_flag},function(result){
		if(result=="success"){
			if(dislike_flag=='yes'){
				$(dislike_icon).addClass("dislike-icon-active");
				$(dislikeTag).attr("dislike","no")
			}
			else{
				$(dislike_icon).removeClass("dislike-icon-active");
				$(dislikeTag).attr("dislike","yes")
			}
		}
	});
}
function like(likeTag,id_comment){
	var like_icon=$(likeTag).find(".like-icon")
	var like_flag=$(likeTag).attr("like");
	$.post("comment.php",{id_comment:id_comment,like:like_flag},function(result){
		if(result=="success"){
			if(like_flag=='yes'){
				$(like_icon).addClass("like-icon-active");
				$(likeTag).attr("like","no")
			}
			else{
				$(like_icon).removeClass("like-icon-active");
				$(likeTag).attr("like","yes")
			}
		}
	});
}