<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Carbon\Carbon;
use App\Genre;
use App\Gender;
use App\Coupon;
use App\Coupontype;
use App\Authority;
use App\Product;
use App\ProductPrice;
use App\State;
use App\Order;
use App\OrderDetail;
use App\Campaign;
use App\User;
use App\Employee;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('GenresMasterSeeder');
        $this->call('CouponsTypesMasterSeeder');
        $this->call('GendersMasterSeeder');
        $this->call('AuthoritiesMasterSeeder');
        $this->call('ProductsMasterSeeder');
        $this->call('ProductsPricesMasterSeeder');
        $this->call('StatesMasterSeeder');
        $this->call('OrdersMasterSeeder');
        $this->call('OrdersDetailsTableSeeder');
        $this->call('CouponsMasterSeeder');
        $this->call('CampaignesMasterSeeder');
        $this->call('UsersSeeder');
        $this->call('EmployeeMasterSeeder');

        Model::reguard();
    }
}

//会員
class UsersSeeder extends Seeder
{

    public function run()
    {

        $faker = Faker::create('ja_JP');


        DB::table('users')->delete();

        User::create([
            'name' => '管理者',
            'kana' => 'カンリシャ',
            'email' => 'admin@oic.jp',
            'password' => bcrypt('root'),
            'postal' => 5900014,
            'address1' => '大阪府堺市堺区登坂町',
            'address2' => '8-5',
            'address3' => '910号室',
            'phone' => '09064325841',
            'gender_id' => 1,
            'birthday' => 19961111,
            'authority_id' => 1,
        ]);
        User::create([
            'name' => '濱田真旗',
            'kana' => 'ハマダマサキ',
            'email' => 'B5163@oic.jp',
            'password' => bcrypt('djmasaki'),
            'postal' => 5550011,
            'address1' => '大阪府大阪市大正区北恩加島',
            'address2' => '2-8-1',
            'address3' => null,
            'phone' => '07038461049',
            'gender_id' => 1,
            'birthday' => 19960607,
            'authority_id' => 2,
        ]);
        User::create([
            'name' => '兵頭佑一',
            'kana' => 'ヒョウドウユウイチ',
            'email' => 'B5123@oic.jp',
            'password' => bcrypt('19970221'),
            'postal' => 5320003,
            'address1' => '大阪府大阪市淀川区宮原町',
            'address2' => '2-8-1',
            'address3' => '312号室',
            'phone' => '09019384468',
            'gender_id' => 1,
            'birthday' => 19970221,
            'authority_id' => 2,
        ]);
        User::create([
            'name' => '土屋百合',
            'kana' => 'ツチヤユリ',
            'email' => 'tsuchiya@oic.jp',
            'password' => bcrypt('tsuchiya'),
            'postal' => 8099999,
            'address1' => $faker->prefecture.$faker->city,
            'address2' => $faker->streetAddress,
            'address3' => null,
            'phone' => '09019384468',
            'gender_id' => 2,
            'birthday' => 19970221,
            'authority_id' => 2,
        ]);
        User::create([
            'name' => '森山みくり',
            'kana' => 'モリヤマミクリ',
            'email' => 'moriyama@oic.jp',
            'password' => bcrypt('moriyama'),
            'postal' => 4532255,
            'address1' => $faker->prefecture.$faker->city,
            'address2' => $faker->streetAddress,
            'address3' => null,
            'phone' => '09019384468',
            'gender_id' => 2,
            'birthday' => 19970221,
            'authority_id' => 2,
        ]);
        User::create([
            'name' => '津崎 平匡',
            'kana' => 'ツザキヒロマサ',
            'email' => 'tsuzaki@oic.jp',
            'password' => bcrypt('tsuzaki'),
            'postal' => 4532255,
            'address1' => $faker->prefecture.$faker->city,
            'address2' => $faker->streetAddress,
            'address3' => null,
            'phone' => '09019384468',
            'gender_id' => 1,
            'birthday' => 19970221,
            'authority_id' => 2,
        ]);

        User::create([
            'name' => '近沢邦彦',
            'kana' => 'チカザワクニヒコ',
            'email' => 'B5164@oic.jp',
            'password' => bcrypt('zawatika'),
            'postal' => 5550012,
            'address1' => '大阪府大阪市大正区北恩加島',
            'address2' => '2-8-2',
            'address3' => null,
            'phone' => '08037401939',
            'gender_id' => 1,
            'birthday' => 19960607,
            'authority_id' => 3,
        ]);


        for ($i=0; $i < 200; $i++) {

            User::create([
                'name' => $faker->name,
                'kana' => 'テスト',
                'email' => $i.$faker->email,
                'password' => bcrypt('faker'),
                'postal' => $faker->postcode,
                'address1' => $faker->prefecture.$faker->city,
                'address2' => $faker->streetAddress,
                'address3' => null,
                'phone' => str_replace(array('-', 'ー'), '', $faker->phoneNumber),
                'gender_id' => rand(1, 2),
                'birthday' => $faker->dateTimeBetween('-80 years', '-20years')->format('Ymd'),
                'authority_id' => 3,
            ]);

        }

    }
}

class EmployeeMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('employees_master')->delete();

        Employee::create([
            'users_id' => 1,
            'emoloyee_agreement_date' => Carbon::parse('2016-10-10'),
            'emoloyee_agreement_enddate' => null,
        ]);

        Employee::create([
            'users_id' => 2,
            'emoloyee_agreement_date' => Carbon::parse('2016-10-10'),
            'emoloyee_agreement_enddate' => null,
        ]);

        Employee::create([
            'users_id' => 3,
            'emoloyee_agreement_date' => Carbon::parse('2016-10-10'),
            'emoloyee_agreement_enddate' => null,
        ]);

        Employee::create([
            'users_id' => 4,
            'emoloyee_agreement_date' => Carbon::parse('2016-10-10'),
            'emoloyee_agreement_enddate' => null,
        ]);

        Employee::create([
            'users_id' => 5,
            'emoloyee_agreement_date' => Carbon::parse('2016-10-10'),
            'emoloyee_agreement_enddate' => null,
        ]);

        Employee::create([
            'users_id' => 6,
            'emoloyee_agreement_date' => Carbon::parse('2016-10-10'),
            'emoloyee_agreement_enddate' => null,
        ]);


    }
}

// ジャンル種別
class GenresMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('genres_master')->delete();

        Genre::create([
            'genre_name' => 'ピザ'
        ]);
        Genre::create([
            'genre_name' => 'サイド'
        ]);
        Genre::create([
            'genre_name' => 'ドリンク'
        ]);
    }
}


// 性別
class GendersMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('genders_master')->delete();

        Gender::create([
            'gender_name' => '男'
        ]);
        Gender::create([
            'gender_name' => '女'
        ]);
    }
}

//クーポン
class CouponsMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('coupons_master')->delete();

        Coupon::create([
            'coupon_name' => '500円値引きクーポン',
            'coupon_discount' => 500,
            'coupon_conditions_money' => 3000,
            'product_id' => 1,
            'coupon_start_date' => Carbon::today(),
            'coupon_end_date' => null,
            'coupon_number' => '00000001',
            'coupon_conditions_count' => 1,
            'coupon_conditions_first' => null,
        ]);
        Coupon::create([
            'coupon_name' => '1000円値引きクーポン',
            'coupon_discount' => 1000,
            'coupon_conditions_money' => 5000,
            'product_id' => 1,
            'coupon_start_date' => Carbon::today(),
            'coupon_end_date' => null,
            'coupon_number' => '00000002',
            'coupon_conditions_count' => 1,
            'coupon_conditions_first' => null,
        ]);
        Coupon::create([
            'coupon_name' => 'プレゼントクーポン',
            'coupon_discount' => 2200,
            'coupon_conditions_money' => 1,
            'product_id' => 2,
            'coupon_start_date' => Carbon::today(),
            'coupon_end_date' => null,
            'coupon_number' => '00000003',
            'coupon_conditions_count' => 1,
            'coupon_conditions_first' => null,
        ]);
        Coupon::create([
            'coupon_name' => 'ピザ無料クーポン',
            'coupon_discount' => 2200,
            'coupon_conditions_money' => 1,
            'product_id' => 2,
            'coupon_start_date' => Carbon::yesterday(),
            'coupon_end_date' => Carbon::yesterday(),
            'coupon_number' => 'MARTIN',
            'coupon_conditions_count' => 1,
            'coupon_conditions_first' => 1,
        ]);
        Coupon::create([
            'coupon_name' => 'プレゼントクーポン',
            'coupon_discount' => 2200,
            'coupon_conditions_money' => 1,
            'product_id' => 2,
            'coupon_start_date' => Carbon::today()->subMonth(),
            'coupon_end_date' => Carbon::today()->subDay(),
            'coupon_number' => 'SUMMER',
            'coupon_conditions_count' => 3,
            'coupon_conditions_first' => 1,
        ]);
    }
}

// クーポン種別
class CouponsTypesMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('coupons_types_master')->delete();

        CouponType::create([
            'coupon_type' => 'sample01'
        ]);
        CouponType::create([
            'coupon_type' => 'sample02'
        ]);
        CouponType::create([
            'coupon_type' => 'sample03'
        ]);
    }
}

//　権限
class AuthoritiesMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('authorities_master')->delete();

        Authority::create([
            'authority_name' => 'Administrator'
        ]);
        Authority::create([
            'authority_name' => 'AuthorityEmployee'
        ]);
        Authority::create([
            'authority_name' => 'Employee'
        ]);
        Authority::create([
            'authority_name' => 'GeneralMember'
        ]);
    }
}

//商品
class ProductsMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('products_master')->delete();

        Product::create([
            'product_name' => '明太バターチーズ',
            'price_id' => 1,
            'product_image' => '/images/product/1.jpg',
            'product_text' => '大きくカットしたポテトにコーンとベーコンをトッピングして、明太クリームソース、バター、チーズを合わせた、家族で楽しめるピザです。',
            'genre_id' => 1,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => null,
        ]);
        Product::create([
            'product_name' => 'じゃがバターベーコン',
            'price_id' => 2,
            'product_image' => '/images/product/2.jpg',
            'product_text' => 'ホクホクのポテトと旨味が凝縮されたベーコンを特製マヨソースで味わって頂く商品です。バター風味豊かなキューブチーズが食材の味を一層引き立てます。',
            'genre_id' => 1,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => null,
        ]);
        Product::create([
            'product_name' => 'フレッシュモッツァレラのジェノベーゼ',
            'price_id' => 3,
            'product_image' => '/images/product/3.jpg',
            'product_text' => '生クリームを加えたバジルの香り豊かなジェノベーゼソースと、まろやかでクセのないフレッシュモッツァレラの香りと濃厚チーズの組み合わせが大人向けの商品',
            'genre_id' => 1,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => null,
        ]);
        Product::create([
            'product_name' => '焼きたてポテト',
            'price_id' => 4,
            'product_image' => '/images/product/4.jpg',
            'product_text' => '少量を食べたいときにおすすめ。皮つきのうまさ！外はカリッ、中はホックリ！お子様にも大人気です！口に運べば、バターの風味とポテトの旨みが広がります。',
            'genre_id' => 2,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => null,
        ]);
        Product::create([
            'product_name' => '十勝産コーンポタージュ',
            'price_id' => 5,
            'product_image' => '/images/product/5.jpg',
            'product_text' => 'コーンをふんだんに入れ、濃厚で上品な甘さが特徴のスープです。北海道十勝産スイートコーンを使用したクリーミーなスープに仕上げました。',
            'genre_id' => 2,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => null,
        ]);
        Product::create([
            'product_name' => 'ローストチキンレッグ',
            'price_id' => 6,
            'product_image' => '/images/product/6.jpg',
            'product_text' => '旨みたっぷりの骨付き鶏肉をガーリックなどの香辛料とハーブで味付けし、表面はパリｯと、中はジューシーにローストしたクリスマスにぴったりのローストチキンです。',
            'genre_id' => 2,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => null,
        ]);
        Product::create([
            'product_name' => 'コカ・コーラ',
            'price_id' => 7,
            'product_image' => '/images/product/7.jpg',
            'product_text' => '税抜き150円',
            'genre_id' => 3,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => null,
        ]);
        Product::create([
            'product_name' => '綾鷹',
            'price_id' => 8,
            'product_image' => '/images/product/8.jpg',
            'product_text' => '税抜き150円',
            'genre_id' => 3,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => null,
        ]);
        Product::create([
            'product_name' => 'Qooみかん',
            'price_id' => 9,
            'product_image' => '/images/product/9.jpg',
            'product_text' => '税抜き150円',
            'genre_id' => 3,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => null,
        ]);
        Product::create([
            'product_name' => 'もち明太グラタン',
            'price_id' => 10,
            'product_image' => '/images/product/10.jpg',
            'product_text' => 'まろやかな明太子クリームソースとホワイトソースを一緒に味わって頂く商品です。',
            'genre_id' => 2,
            'sales_start_date' => Carbon::parse('2016-10-10'),
            'sales_end_date' => Carbon::yesterday(),
        ]);
    }
}

//商品価格
class ProductsPricesMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('products_prices_master')->delete();

        ProductPrice::create([
            'product_id' => 1,
            'product_price' => '1990',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 1,
        ]);
        ProductPrice::create([
            'product_id' => 2,
            'product_price' => '2200',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 2,
        ]);
        ProductPrice::create([
            'product_id' => 3,
            'product_price' => '1800',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 3,
        ]);
        ProductPrice::create([
            'product_id' => 4,
            'product_price' => '410',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 3,
        ]);
        ProductPrice::create([
            'product_id' => 5,
            'product_price' => '400',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 3,
        ]);
        ProductPrice::create([
            'product_id' => 6,
            'product_price' => '734',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 3,
        ]);
        ProductPrice::create([
            'product_id' => 7,
            'product_price' => '162',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 3,
        ]);
        ProductPrice::create([
            'product_id' => 8,
            'product_price' => '162',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 3,
        ]);
        ProductPrice::create([
            'product_id' => 9,
            'product_price' => '162',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 3,
        ]);
        ProductPrice::create([
            'product_id' => 10,
            'product_price' => '680',
            'price_change_startdate' => Carbon::parse('2016-10-10'),
            'price_change_enddate' => null,
            'employee_id' => 3,
        ]);
    }
}

//状態
class StatesMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('states_master')->delete();

        State::create([
            'state_name' => '未完了'
        ]);
        State::create([
            'state_name' => '完了'
        ]);

    }
}

//注文
class OrdersMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('orders_master')->delete();

        Order::create([
            'order_date' => Carbon::now(),
            'order_appointment_date' => Carbon::tomorrow(),
            'coupon_id' => 1,
            'state_id' => 1,
            'user_id' => 4,
        ]);
        Order::create([
            'order_date' => Carbon::now(),
            'order_appointment_date' => Carbon::tomorrow(),
            'coupon_id' => null,
            'state_id' => 1,
            'user_id' => 5,
        ]);
        Order::create([
            'order_date' => Carbon::now(),
            'order_appointment_date' => Carbon::tomorrow(),
            'coupon_id' => null,
            'state_id' => 1,
            'user_id' => 6,
        ]);
        Order::create([
            'order_date' => Carbon::now(),
            'order_appointment_date' => Carbon::tomorrow(),
            'coupon_id' => null,
            'state_id' => 1,
            'user_id' => 4,
        ]);
    }
}

//注文明細
class OrdersDetailsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('orders_details_table')->delete();

        OrderDetail::create([
            'id' => 1,
            'price_id' => 1,
            'number' => 1,
        ]);
        OrderDetail::create([
            'id' => 1,
            'price_id' => 2,
            'number' => 2,
        ]);
        OrderDetail::create([
            'id' => 1,
            'price_id' => 3,
            'number' => 3,
        ]);
        OrderDetail::create([
            'id' => 2,
            'price_id' => 4,
            'number' => 3,
        ]);
        OrderDetail::create([
            'id' => 2,
            'price_id' => 7,
            'number' => 3,
        ]);
        OrderDetail::create([
            'id' => 3,
            'price_id' => 8,
            'number' => 3,
        ]);
        OrderDetail::create([
            'id' => 4,
            'price_id' => 1,
            'number' => 3,
        ]);
        OrderDetail::create([
            'id' => 4,
            'price_id' => 2,
            'number' => 3,
        ]);
    }
}

//キャンペーン
class CampaignesMasterSeeder extends Seeder
{

    public function run()
    {
        DB::table('campaigns_master')->delete();

        Campaign::create([
            'campaign_title' => '秋の贅沢サプライズ４',
            'campaign_image' => 'public/images/campaign/1.jpg',
            'campaign_text' => 'このトッピングでこの贅沢がお手頃価格で登場！ポケット状の ‘みみ’部分に4分の1ずつ異なるビーフステーキや北海道産チーズなど贅沢な4種の具材を包み、…',
            'campaign_note' => '秋限定です。',
            'campaign_subject' => 'allユーザー',
            'campaign_start_day' => Carbon::today(),
            'campaign_end_day' => null,
        ]);
        Campaign::create([
            'campaign_title' => '濃厚ゴージャス4',
            'campaign_image' => 'public/images/campaign/2.jpg',
            'campaign_text' => '[期間限定】「パリッとソーセージクラスト」Ｍサイズが今なら\880もお得！「厚切イベリコ」、「贅沢フォルマッジ」「ピザハット・シュ…',
            'campaign_note' => '秋限定です。',
            'campaign_subject' => 'allユーザー',
            'campaign_start_day' => Carbon::today(),
            'campaign_end_day' => null,
        ]);
        Campaign::create([
            'campaign_title' => '家族の満足4',
            'campaign_image' => 'public/images/campaign/3.jpg',
            'campaign_text' => '【期間限定】「ゴールデンチーズクラスト」Ｍサイズが今なら\640もお得！「ほっくりポテマヨ」「ペパロニ・シュプリーム」「もちポテ明…',
            'campaign_note' => '秋限定です。',
            'campaign_subject' => 'allユーザー',
            'campaign_start_day' => Carbon::today(),
            'campaign_end_day' => null,
        ]);

    }
}
