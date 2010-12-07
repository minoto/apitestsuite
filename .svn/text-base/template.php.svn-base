<html>
  <head>
    <title>OAuth REST Client</title>
    <link rel="stylesheet" href="styles/screen.css" />
  </head>
  <body>
    <div id="input">
        <form method="post">
            <fieldset>
                <legend>Credentials</legend>
                <p>
                    <label for="iConsumerKey">Consumer Key</label>
                    <input type="text" name="consumerKey" id="iConsumerKey" value="<?=$requestSettings->getConsumerKey() ?>" />
                </p>
                <p>
                    <label for="iConsumerSecret">Consumer Secret</label>
                    <input type="text" name="consumerSecret" id="iConsumerSecret" value="<?=$requestSettings->getConsumerSecret() ?>" />
                </p>
                <p>
                    <label for="iAccessToken">Access Token</label>
                    <input type="text" name="accessToken" id="iAccessToken" value="<?=$requestSettings->getAccessToken() ?>" />
                </p>
                <p>
                    <label for="iTokenSecret">Token Secret</label>
                    <input type="text" name="tokenSecret" id="iTokenSecret" value="<?=$requestSettings->getTokenSecret() ?>" />
                </p>
            </fieldset>
            
            <fieldset>
                <legend>Request</legend>
                <p>
                    <label for="iProtocol">Protocol</label>
                    <select name="protocol" id="iProtocol">
                        <?=$requestSettings->getProtocolOptionList()?>
                    </select>
                </p>
                <p>
                    <label for="iHost">Host</label>
                    <input type="text" name="host" id="iHost" value="<?=$requestSettings->getHost() ?>" />
                </p>
                <p>
                    <label for="iPath">Path</label>
                    <input type="text" name="path" id="iPath" value="<?=$requestSettings->getPath() ?>" />
                </p>
                <p>
                    <label for="iMethod">Method</label>
                    <select name="method" id="iMethod">
                        <?=$requestSettings->getMethodOptionList()?>
                    </select>
                </p>
                <p>
                    <label for="iParameters">Parameters</label>
                    <textarea name="parameters" id="iParameters"><?=$requestSettings->getParameters() ?></textarea>
                </p>
                <p>
                    <label for="iBody">Body</label>
                    <textarea name="body" id="iBody"><?=$requestSettings->getBody() ?></textarea>
                </p>
                <p>
                    <label for="iHeaders">Headers</label>
                    <textarea name="headers" id="iHeaders"><?=$requestSettings->getHeaders() ?></textarea>
                </p>
            </fieldset>   
            
            <fieldset>
                <legend>Advanced</legend>
                 <p>
                    <label for="iProcessResult">Process Result</label>
                    <input type="checkbox" name="processResult" id="iProcessResult" value="true" <?=($requestSettings->processResult()?' checked="checked" ':null)?>/>
                </p>
                <p>
                    <label for="iSignatureMethod">Signature Method</label>
                    <select name="signatureMethod" id="iSignatureMethod">
                        <?=$requestSettings->getSignatureMethodOptionList()?>
                    </select>
                </p>
            </fieldset> 
            <fieldset>
                <legend>Whatyerwaitingfor?</legend>
                <p>
                    <input type="submit" name="submit" value="Perform Request" />
                </p>  
            </fieldset>
        </form>
        <div id="helpLink"><a id="helpLink" href="index.php"><img src="images/help.gif" alt="Help" /></a></div>
    </div>
    <div id="output">
    
        <?php if(count($errors)) {?>
        Errors!
        <?php } elseif(isset($result)) { ?>
        <div>
            <h2>HTTP Status : <?=$result['code']?></h2>
        </div>
        <div id="headers">
            <h2>Headers</h2>
            <table>
                <tbody>
                <?php 
                foreach($result['headers'] as $header => $value) {
                    print '<tr><th>' . $header . '</th><td>' . $value . '</td></tr>';
                } 
                ?>
                </tbody>
            </table>
        </div>
        <div>
            <h2>Body</h2>
            <p>
            <pre style="overflow:hidden;"><?=htmlspecialchars($result['body'])?></pre>
            </p>
        </div>
        <?php 
        if(strlen(@$result['processed'])) {
        ?>
        <div>
            <h2>Processed Body</h2>
            <?=$result['processed']?></p>
        </div>
        <?php } ?>
        <?php } else { ?>
        <h1>OAuth REST Test Client</h1>
        <p>This client helps you test an OAuth protected REST API.</p>
        <h2>Some parameters explained</h2>
        <table>
            <thead>
                <th>Parameter</th>
                <th>Description</th>
                <th>Example</th>
            </thead>
            <tbody>
            <tr>
                <th>Parameters</th>
                <td>Querystring parameters, key/value pairs separated by an '=', one per line</td>
                <td><pre>filter[status]=completed
output_format=php</pre></td>
            </tr>
            <tr>
                <th>Body</th>
                <td>The body of the HTTP request. Only used for 'POST' and 'PUT' HTTP methods</td>
                <td><pre>&lt;video&gt;
  &lt;title&gt;My New Video&lt;/title&gt;
&lt;/video&gt;</pre></td>
            </tr>
            <tr>
                <th>Headers</th>
                <td>The headers of the HTTP request. One per line.</td>
                <td><pre>Accept: +xml</pre></td>
            </tr>
            <tr>
                <th>Process Result</th>
                <td>Process the body of the result further if possible. Currently only available for <em>+php</em> content-types. A body with this content-type will be unserialized and displayed.</td>
                <td>&nbsp;</td>
            </tr>
            </tbody>
        </table>
        <h2>About</h2>
        Copyright 2010, <a href="http://www.minoto-interactive.com">Minoto Interactive Media Group</a>
        <?php } ?>
    </div>
  </body>
</html>  