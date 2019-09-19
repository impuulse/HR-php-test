<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUS_NEW = 0;
    const STATUS_ACCEPTED = 10;
    const STATUS_DONE = 20;

    /**
     * Товары
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Products()
    {
        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id');
    }

    /**
     * Названия товаров в заказе
     * @return string
     */
    public function getProductNames()
    {
        return $this->products()->pluck('name')->implode(', ');
    }

    /**
     * Партнер
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Partner()
    {
        return $this->hasOne('App\Partner', 'id', 'partner_id');
    }

    /**
     * Стоимость заказа
     * @return mixed
     */
    public function getPrice()
    {
        return $this->products()->sum('order_products.price');
    }

    /**
     * Статус заказа
     * @return mixed
     */
    public function getStatus()
    {
        return self::statuses()[$this->getAttribute('status')];
    }

    /**
     * Возможные статусы заказа
     * @return array
     */
    public static function statuses()
    {
        return [
            self::STATUS_NEW => 'Новый',
            self::STATUS_ACCEPTED => 'Подтвержден',
            self::STATUS_DONE => 'Завершен'
        ];
    }
}
