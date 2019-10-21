SELECT *
FROM users
JOIN user_profiles ON user_profiles.id = users.user_profile_id
WHERE users.id = 1;

