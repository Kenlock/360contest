<?php

/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage YouTube
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: MediaEntry.php 24593 2012-01-05 20:35:02Z matthew $
 */

/**
 * @see Zend_Gdata_Media
 */
require_once APP."Plugin".DS."VideoResources".DS."Vendor".DS."Youtube".DS.'Zend/Gdata/Media.php';

/**
 * @see Zend_Gdata_Media_Entry
 */
require_once APP."Plugin".DS."VideoResources".DS."Vendor".DS."Youtube".DS.'Zend/Gdata/Media/Entry.php';

/**
 * @see Zend_Gdata_YouTube_Extension_MediaGroup
 */
require_once APP."Plugin".DS."VideoResources".DS."Vendor".DS."Youtube".DS.'Zend/Gdata/YouTube/Extension/MediaGroup.php';

/**
 * Represents the YouTube flavor of a Gdata Media Entry
 *
 * @category   Zend
 * @package    Zend_Gdata
 * @subpackage YouTube
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_Gdata_YouTube_MediaEntry extends Zend_Gdata_Media_Entry
{

    protected $_entryClassName = 'Zend_Gdata_YouTube_MediaEntry';

    /**
     * media:group element
     *
     * @var Zend_Gdata_YouTube_Extension_MediaGroup
     */
    protected $_mediaGroup = null;

    /**
     * Creates individual Entry objects of the appropriate type and
     * stores them as members of this entry based upon DOM data.
     *
     * @param DOMNode $child The DOMNode to process
     */
    protected function takeChildFromDOM($child)
    {
        $absoluteNodeName = $child->namespaceURI . ':' . $child->localName;
        switch ($absoluteNodeName) {
        case $this->lookupNamespace('media') . ':' . 'group':
            $mediaGroup = new Zend_Gdata_YouTube_Extension_MediaGroup();
            $mediaGroup->transferFromDOM($child);
            $this->_mediaGroup = $mediaGroup;
            break;
        default:
            parent::takeChildFromDOM($child);
            break;
        }
    }

}