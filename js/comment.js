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
		
		//$(".reply-panel").hide();
		//$(".reply").attr("toggle","1");
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

	$.post("commentList.php",{id_product:product,commentPage:page},function(data){
					$(comments).html(data);
					if($(".pagination")){
						
						var totalpage=$(".pagination").attr("total");
						if(page>1){
							$(".pagination").append('<a href="#?page='+(page-1)+' "  class="tool" onclick="javascript:fetchComments(\''+product+'\',$(\'.comments\'),'+(page-1)+')"> Prev </a>');
						}else{
							$(".pagination").append('<span class="tool-disable"> Prev </span>');
						}
						
						var fromPage=(totalpage>10)?(page>totalpage-8?totalpage-10:(page<=5?1:page-3)):1;
						var toPage=(totalpage>10)?(page>totalpage-5?totalpage:(page<=8?10:page+3)):totalpage;
					
						if(fromPage>1){
							for(i=1;i<fromPage;i++){
								$(".pagination").append('<a href="#?page='+i+'" onclick="javascript:fetchComments(\''+product+'\',$(\'.comments\'),'+i+')">'+i+'</a>');
								
								if(i==2) break;
							}	
						}
						if(fromPage>3){
							$(".pagination").append('<span>...</span>');
						}

						for(var i=fromPage;i<=toPage;i++){
							if(i==page){
								$(".pagination").append('<a href="#?page='+i+'" class="current" onclick="javascript:fetchComments(\''+product+'\',$(\'.comments\'),'+i+')">'+i+'</a>');
							}

							else
								$(".pagination").append('<a href="#?page='+i+'" onclick="javascript:fetchComments(\''+product+'\',$(\'.comments\'),'+i+')">'+i+'</a>');

						}
						if(toPage<totalpage-2){
							$(".pagination").append('<span>...</span>');
						}
						if(toPage<totalpage){
							for(i=totalpage-1;i<=totalpage;i++){
								if(i>toPage)
									$(".pagination").append('<a href="#?page='+i+'" onclick="javascript:fetchComments(\''+product+'\',$(\'.comments\'),'+i+')">'+i+'</a>');
							}	
						}
						if(page<totalpage){
							$(".pagination").append('<a href="#?page='+(page+1)+' "   class="tool" onclick="javascript:fetchComments(\''+product+'\',$(\'.comments\'),'+(page+1)+')">Next</a>');
						}else{
							$(".pagination").append('<span class="tool-disable">Next</span>');
						}
						
					}
					

	})
}
function addComment(pro,replyer,id_parent,comment_btn){
	var page=getPar("page");
	page=page?page:1;
	var commentArea=$(comment_btn).parent().find("textarea");
	var content=$(commentArea).val();
	
	var comments=$(".comments");

	$.post("comment.php",{product:pro,replyer:replyer,content:content,id_parent:id_parent},function(result){
			console.log(result)
			if(result=="success"){
				fetchComments(pro,comments,page);
				$(commentArea).val("");
			}else{

			}
			
			
	})
}
function reply(reply_btn,product,comment_id,replyer){

    	addComment(product,comment_id,replyer,$(reply_btn).parent().find("textarea"),$(".comments"));
	}
	function comment(comment_btn,product){
		addComment(product,replyer,id_parent,comments,page)
	}

function dislike(dislikeTag,id_comment){
	var dislike_icon=$(dislikeTag).find(".dislike-icon")
	var dislike_flag=($(dislikeTag).attr("dislike")=="yes")?"no":"yes";
	$.post("comment.php",{id_comment:id_comment,dislike:dislike_flag},function(result){
		if(result=="success"){
			if(dislike_flag=='yes'){
				$(dislike_icon).addClass("dislike-icon-active");
				$(dislikeTag).attr("dislike","yes")
			}
			else{
				$(dislike_icon).removeClass("dislike-icon-active");
				$(dislikeTag).attr("dislike","no")
			}
		}
	});
}
function like(likeTag,id_comment){
	var like_icon=$(likeTag).find(".like-icon")
	var like_flag=($(likeTag).attr("like")=="yes")?"no":"yes";
	$.post("comment.php",{id_comment:id_comment,like:like_flag},function(result){
		if(result=="success"){
			if(like_flag=='yes'){
				$(like_icon).addClass("like-icon-active");
				$(likeTag).attr("like","yes")
			}
			else{
				$(like_icon).removeClass("like-icon-active");
				$(likeTag).attr("like","no")
			}
		}
	});
}