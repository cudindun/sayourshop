<?php namespace App\Http\Libraries;
use App\Http\Models\Badge;
use App\Http\Models\UserBadge;
use App\Http\Libraries\GetUser;
use App\Http\Models\Product;
use DB;

class Rank {
	//dipanggil setelah checkout

	public static function addToUserBadge($product_id)//param -> int => menambahkan rank utk pemilik produk
	{
		$product = Product::find($product_id);
		$category_id = $product->item->category->id;
		$user_id = $product->shop->user->id;
		$category_sale = $product->CategoryTotalSell();
		$badges = Badge::where('category_id', $category_id)->get();
		foreach ($badges as $badge) {
			if($category_sale >= $badge->sale_from and $category_sale <= $badge->sale_to){
				UserBadge::firstOrCreate(['user_id' => $user_id, 'badge_id' => $badge->id]);
			}
		}
	}

	public static function lastBadge($product)// param -> object => ambil rank terakhir dari pemilik produk utk kategori produknya
	{
		$badge = DB::table('users_badges')
					->join('badges', 'badges.id', '=', 'users_badges.badge_id')
					->where('users_badges.user_id', '=', $product->shop->user->id)
					->where('category_id', '=', $product->item->category->id)
					->orderBy('badges.id', 'desc')->first();
		return $badge;
	}
}