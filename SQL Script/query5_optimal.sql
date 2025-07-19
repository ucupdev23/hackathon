CREATE INDEX idx_orders_user_month_truncated ON orders (user_id, DATE_TRUNC('month', order_date));

SELECT
    u.name AS user_name,
    DATE_TRUNC('month', o.order_date) AS order_month,
    COUNT(o.id) AS total_orders_in_month,
    SUM(o.total_amount) AS total_spent_in_month
FROM users u
JOIN orders o ON u.id = o.user_id
GROUP BY u.id, u.name, order_month
ORDER BY u.name, order_month;
