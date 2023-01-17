<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport"
          content="width=device-width,user-scalable, initial-scale=1.0,
          maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>防火対象物管理アプリ</title>
</head>
<body>
<!--CDNにてReactを導入-->
    <p>
    候補者1:田中
    <div class="vote_button_container"></div>
    </p>
    
    <p>
    候補者2:鈴木
    <div class="vote_button_container"></div>
    </p>
    
    <p>
    候補者3:佐藤
    <div class="vote_button_container"></div>
    </p>
    <script src="https://unpkg.com/react@16/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/babel-standalone@6/babel.min.js"></script>
    <script type="text/babel">
        'use strict';
        class VoteButton extends React.Component {
            constructor(props) {
                super(props);
                this.state = { voted: false };
            }

            render() {
                if (this.state.voted) {
                    return (
                        <button onClick={() => this.setState({ voted: false })}>
                            voted
                        </button>
                    )
                } else {
                    return (
                        <button onClick={() => this.setState({ voted: true })}>
                        vote
                        </button>
                    );
                }
            }
        }
        document.querySelectorAll('.vote_button_container')
            .forEach(domContainer => {
                ReactDOM.render(
                    React.createElement(VoteButton),
                    domContainer
                );
            });
    </script>
</body>
</html>