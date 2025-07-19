CREATE INDEX idx_orders_user_id ON orders (user_id);

SELECT u.id, u.name, u.email
FROM users u
WHERE u.id NOT IN (SELECT DISTINCT user_id FROM orders);
