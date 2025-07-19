CREATE INDEX idx_order_items_product_id ON order_items (product_id);

SELECT
    p.name,
    SUM(oi.quantity) AS total_sold
FROM order_items oi
JOIN products p ON oi.product_id = p.id
GROUP BY p.name
ORDER BY total_sold DESC
LIMIT 10;
