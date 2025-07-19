SELECT
    u.name AS user_name,
    TO_CHAR(o.order_date, 'YYYY-MM') AS order_month,
    COUNT(o.id) AS total_orders_in_month,
    SUM(o.total_amount) AS total_spent_in_month
FROM users u
JOIN orders o ON u.id = o.user_id
GROUP BY u.name, order_month
ORDER BY u.name, order_month;
