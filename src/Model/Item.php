<?php

namespace Corcel\WooCommerce\Model;

use Corcel\Concerns\MetaFields;
use Corcel\Model;

class Item extends Model
{
    use MetaFields;

    public $timestamps = false;

    protected $fillable = [
        'order_item_name',
        'order_item_type',
        'order_id',
    ];

    /**
     * @var array
     */
    protected $appends = [
        'product_id',
        'quantity',
        'variation_id',
        'tax_class',
        'line_subtotal',
        'line_subtotal_tax',
        'line_total',
        'line_tax',
    ];

    /**
     * @var string
     */
    protected $table = 'woocommerce_order_items';

    protected $primaryKey = 'order_item_id';

    /**
     * @return mixed
     */
    public function getLineSubtotalAttribute()
    {
        return $this->meta->_line_subtotal;
    }

    /**
     * @return mixed
     */
    public function getLineSubtotalTaxAttribute()
    {
        return $this->meta->_line_subtotal_tax;
    }

    /**
     * @return mixed
     */
    public function getLineTaxAttribute()
    {
        return $this->meta->_line_tax;
    }

    /**
     * @return mixed
     */
    public function getLineTotalAttribute()
    {
        return $this->meta->_line_total;
    }

    /**
     * @return mixed
     */
    public function getProductIdAttribute()
    {
        return $this->meta->_product_id;
    }

    /**
     * @return mixed
     */
    public function getQuantityAttribute()
    {
        return $this->meta->_qty;
    }

    /**
     * @return mixed
     */
    public function getTaxClassAttribute()
    {
        return $this->meta->_tax_class;
    }

    /**
     * @return mixed
     */
    public function getVariationIdAttribute()
    {
        return $this->meta->_variation_id;
    }

    /**
     * @return mixed
     */
    public function meta()
    {
        return $this->hasMany(Meta\ItemMeta::class, 'order_item_id', 'order_item_id');
    }

    /**
     * @return mixed
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return mixed
     */
    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
