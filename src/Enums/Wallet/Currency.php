<?php
namespace App\Enums\Wallet;

enum Currency: int
{
    case AZP = 10000;
    case BTC = 10001;
    case ETH = 10002;
    case LTC = 10003;
    case TRX = 10004;
    case USDT_TRX = 10005;
    case USDT_ETH = 10006;
    case BNB_BSC = 10007;
    case BNB_ETH = 10008;
    case BUSD_BSC = 10009;
    case BUSD_ETH = 10010;
    case ADA = 10011;
    case DOT = 10012;
    case DOGE = 10013;
    case XRP = 10014;
    case XLM = 10015;
    case BCH = 10016;
    case SOL = 10017;
    case MATIC = 10018;
    case ALGO = 10019;
    case ZEC = 10020;
    case DASH = 10021;
    case USDC_ETH = 10022;
    case USDC_TRX = 10023;
    case USDC_SOL = 10024;

    public static function getValues(): array
    {
        return array_values(self::toArray());
    }

    public static function toArray(): array
    {
        return array_map(function ($value) {
            return is_object($value) ? $value->value : $value;
        }, (new \ReflectionClass(static::class))->getConstants());
    }
}
