<?php

namespace Commerce\Adjusters;

use Craft\Commerce_LineItemModel;
use Craft\Commerce_OrderAdjustmentModel;
use Craft\Commerce_OrderModel;
use Craft\AvataxTaxAdjuster_SalesTaxService as SalesTaxService;

class AvataxTaxAdjuster implements Commerce_AdjusterInterface {

  public function adjust(Commerce_OrderModel &$order, array $lineItems = []){

    if( $order->shippingAddress && $order->shippingMethodHandle !== NULL && sizeof($order->lineItems) > 0)
    {
      $taxService = new SalesTaxService;

      $taxResult = $taxService->createSalesOrder($order);

      if($taxResult)
      {
        $order->baseTax = $order->baseTax + $taxResult->totalTax;

        $taxAdjuster = new Commerce_OrderAdjustmentModel();

        $taxAdjuster->type = "Tax";
        $taxAdjuster->name = $taxResult->summary[0]->taxName;
        $taxAdjuster->description = "Adds $".$taxResult->totalTax." of tax to the order";
        $taxAdjuster->amount = +$taxResult->totalTax;
        $taxAdjuster->orderId = $order->id;
        // If your Adjuster affects lineItems rather than the total, you record the ids here
        $taxAdjuster->optionsJson = ['service' => 'avatax', 'lineItemsAffected' => null ];
        $taxAdjuster->included = false;

        return [$taxAdjuster];
      }

      // no sales tax returned
      return [];

    } else {

      // shippming method specified or order does not contain line items
      return [];
    };
  }
}