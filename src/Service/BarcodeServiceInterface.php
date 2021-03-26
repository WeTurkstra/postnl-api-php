<?php
/**
 * The MIT License (MIT).
 *
 * Copyright (c) 2017-2020 Michael Dekker (https://github.com/firstred)
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and
 * associated documentation files (the "Software"), to deal in the Software without restriction,
 * including without limitation the rights to use, copy, modify, merge, publish, distribute,
 * sublicense, and/or sell copies of the Software, and to permit persons to whom the Software
 * is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or
 * substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT
 * NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 * NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM,
 * DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @author    Michael Dekker <git@michaeldekker.nl>
 * @copyright 2017-2021 Michael Dekker
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace ThirtyBees\PostNL\Service;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use ReflectionException;
use ThirtyBees\PostNL\Entity\Request\GenerateBarcode;
use ThirtyBees\PostNL\Exception\ApiException;
use ThirtyBees\PostNL\Exception\CifDownException;
use ThirtyBees\PostNL\Exception\CifException;
use ThirtyBees\PostNL\Exception\HttpClientException;
use ThirtyBees\PostNL\Exception\ResponseException;

/**
 * Class BarcodeService.
 *
 * @method string           generateBarcode(GenerateBarcode $generateBarcode)
 * @method RequestInterface buildGenerateBarcodeRequest(GenerateBarcode $generateBarcode)
 * @method string           processGenerateBarcodeResponse(mixed $response)
 * @method string[]         generateBarcodes(GenerateBarcode[] $generateBarcode)
 *
 * @since 1.2.0
 */
interface BarcodeServiceInterface extends ServiceInterface
{
    /**
     * Generate a single barcode.
     *
     * @param GenerateBarcode $generateBarcode
     *
     * @return string|null Barcode
     *
     * @throws ApiException
     * @throws CifDownException
     * @throws CifException
     * @throws HttpClientException
     * @throws ReflectionException
     * @throws ResponseException
     *
     * @since 1.0.0
     */
    public function generateBarcodeREST(GenerateBarcode $generateBarcode);

    /**
     * Generate multiple barcodes at once.
     *
     * @param GenerateBarcode[] $generateBarcodes
     *
     * @return string[]|ResponseException[]|ApiException[]|CifDownException[]|CifException[] Barcodes
     *
     * @throws HttpClientException
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function generateBarcodesREST(array $generateBarcodes);

    /**
     * Generate a single barcode.
     *
     * @param GenerateBarcode $generateBarcode
     *
     * @return string Barcode
     *
     * @throws CifDownException
     * @throws CifException
     * @throws HttpClientException
     * @throws ReflectionException
     * @throws ResponseException
     *
     * @since 1.0.0
     */
    public function generateBarcodeSOAP(GenerateBarcode $generateBarcode);

    /**
     * Generate multiple barcodes at once.
     *
     * @param GenerateBarcode[] $generateBarcodes
     *
     * @return string[] Barcodes
     *
     * @throws HttpClientException
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function generateBarcodesSOAP(array $generateBarcodes);

    /**
     * Build the `generateBarcode` HTTP request for the REST API.
     *
     * @param GenerateBarcode $generateBarcode
     *
     * @return RequestInterface
     *
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function buildGenerateBarcodeRequestREST(GenerateBarcode $generateBarcode);

    /**
     * Process GenerateBarcode REST response.
     *
     * @param ResponseInterface $response
     *
     * @return array
     *
     * @throws ApiException
     * @throws CifDownException
     * @throws CifException
     * @throws HttpClientException
     * @throws ResponseException
     *
     * @since 1.0.0
     */
    public function processGenerateBarcodeResponseREST(ResponseInterface $response);

    /**
     * Build the `generateBarcode` HTTP request for the SOAP API.
     *
     * @param GenerateBarcode $generateBarcode
     *
     * @return RequestInterface
     * @throws ReflectionException
     *
     * @since 1.0.0
     */
    public function buildGenerateBarcodeRequestSOAP(GenerateBarcode $generateBarcode);

    /**
     * Process GenerateBarcode SOAP response.
     *
     * @param ResponseInterface $response
     *
     * @return string
     *
     * @throws CifDownException
     * @throws CifException
     * @throws HttpClientException
     * @throws ResponseException
     *
     * @since 1.0.0
     */
    public function processGenerateBarcodeResponseSOAP(ResponseInterface $response);
}