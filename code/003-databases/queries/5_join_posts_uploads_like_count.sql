SELECT
   posts.id,
   posts.title,
   posts.body,
   posts.user_id,
   uploads.filename,
   COUNT(likes.id) as likeCount
FROM
   posts
   LEFT JOIN uploads ON uploads.object_id = posts.id
   LEFT JOIN likes ON likes.object_type = 'post' AND likes.object_id = posts.id
ORDER BY created_at DESC
LIMIT 5
