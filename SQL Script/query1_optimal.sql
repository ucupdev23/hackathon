CREATE INDEX idx_orders_user_id ON orders (user_id);

SELECT
    u.name AS user_name,
    o.order_date,
    o.total_amount,
    p.name AS product_name,
    oi.quantity,
    oi.price_at_order
FROM users u
JOIN orders o ON u.id = o.user_id
JOIN order_items oi ON o.id = oi.order_id
JOIN products p ON oi.product_id = p.id
WHERE u.name LIKE 'Rowland Walter%';
