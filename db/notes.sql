CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL,
    content TEXT CHARACTER SET utf8mb4 NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

INSERT INTO notes (title, content) VALUES
(
    'Ghi chú đầu tiên',
    'Đây là ghi chú mẫu đầu tiên trong hệ thống. Có thể dùng để test giao diện và chức năng.'
),
(
    'Việc cần làm hôm nay',
    '- Học PHP
- Kết nối MySQL
- Hoàn thiện project demo'
),
(
    'Ý tưởng project',
    'Xây dựng hệ thống ghi chú có upload hình ảnh, đăng nhập người dùng và phân quyền.'
),
(
    'Reminder',
    'Đừng quên backup database trước khi refactor code.'
);