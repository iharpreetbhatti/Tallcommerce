<?php

namespace App\Enums;

enum OrderStatus: string
{
  // write status cases for orders
  case Pending = "pending";
  case Processing = "processing";
  case Shipped = "shipped";
  case Delivered = "delivered";
  case Cancelled = "cancelled";
}
