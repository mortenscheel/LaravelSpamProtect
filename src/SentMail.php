<?php

namespace MortenScheel\SpamProtect;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SentMail
 *
 * @property int $id
 * @property string $address_hash
 * @property string $body_hash
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SentMail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SentMail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SentMail whereAddressHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SentMail whereBodyHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SentMail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SentMail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SentMail whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SentMail extends Model
{
    protected $fillable = ['address_hash', 'body_hash'];
}
