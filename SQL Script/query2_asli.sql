SELECT
    SUM(oi.quantity * oi.price_at_order) AS total_revenue
FROM order_items oi
JOIN products p ON oi.product_id = p.id
JOIN orders o ON oi.order_id = o.id
WHERE p.description LIKE '%Sed%'
AND o.order_date BETWEEN '2025-01-01' AND '2025-03-31';
