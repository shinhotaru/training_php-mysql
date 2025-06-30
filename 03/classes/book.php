<?php
class Book
{
    public string $title;
    public string $author;
    public int $page;
    public int $price;

    public array $errors = [];

    public function __construct(array $data)
    {
        $this->title = trim($data['title'] ?? '');
        $this->author = trim($data['author'] ?? '');
        $this->page = (int)($data['page'] ?? 0);
        $this->price = (int)($data['price'] ?? 0);
    }

    public function isValid(): bool
    {
        $this->errors = [];

        if (empty($this->title)) {
            $this->errors[] = 'タイトルは必須です';
        }

        if (empty($this->author)) {
            $this->errors[] = '著者は必須です';
        }

        if (!preg_match('/^[0-9]+$/', (string)$this->page)) {
            $this->errors[] = 'ページ数は半角数字で入力してください';
        }

        if (!preg_match('/^[0-9]+$/', (string)$this->price) || $this->price < 1 || $this->price >= 100000) {
            $this->errors[] = '価格は半角数字で1円以上100,000円以下で入力してください';
        }

        return empty($this->errors);
    }
}

