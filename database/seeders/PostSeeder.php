<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->format('Y-m-d H:i:s');
        DB::table('posts')->insert([
            [
                'title' => 'Thuật toán sắp xếp nhanh (Quick sort)',
                'slug' => 'quick-sort',
                'category_id' => 1,
                'introduction' => 'Sắp xếp nhanh (Quick sort) là một loại thuật toán chia để trị dùng để sắp xếp một mảng hoặc danh sách các phần tử. Quick sort được phát triển bởi nhà khoa học máy tính người Anh Tony Hoare vào năm 195',
                'content' => '<p>Ý tưởng của quick sort là việc phân hoạch 1 mảng lớn thành 2 mảng con nhỏ hơn dựa vào phần tử chốt (pivot), các phần tử có giá trị nhỏ hơn giá trị của phần tử chốt sẽ được xếp vào một mảng, trong khi các phần tử lớn hơn sẽ được xếp vào mảng còn lại. Tiếp tục quá trình phân hoạch trên các mảng con cho đến khi mảng con chỉ còn 1 phần tử, hoặc các phần tử trong mảng bằng nhau, ta thu được mảng lớn là 1 mảng có thứ tự.</p><p><ul>Các bước thực hiện:<li>Gọi mảng cần sắp xếp là A. Chọn ra từ A 1 phần tử làm phần tử chốt p.</li><li>Tạo ra 2 con nháy L và R. Đặt con nháy L ở phía bên trái mảng, con nháy R ở phía bên phải.</li></ul></p>',
                'author' => 1,
                'image' => 'data-tructure-and-algorithms.jpg',
                'public_date' => $now,
                'created_by' => 1,
                'updated_by' => 1,
            ],
            [
                'title' => 'Sắp xếp trộn (Merge sort) ',
                'slug' => 'merge_sort',
                'category_id' => 1,
                'introduction' => 'Sắp xếp nhanh (Quick sort) là một loại thuật toán chia để trị dùng để sắp xếp một mảng hoặc danh sách các phần tử. Quick sort được phát triển bởi nhà khoa học máy tính người Anh Tony Hoare vào năm 195',
                'content' => 'Sắp xếp nhanh (Quick sort) là một loại thuật toán chia để trị dùng để sắp xếp một mảng hoặc danh sách các phần tử. Quick sort được phát triển bởi nhà khoa học máy tính người Anh Tony Hoare vào năm 195',
                'author' => 1,
                'image' => 'data-tructure-and-algorithms.jpg',
                'public_date' => $now,
                'created_by' => 1,
                'updated_by' => 1,
            ],
        ]);
    }
}
