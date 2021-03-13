
const config = {
  type: Phaser.AUTO,
  parent: 'game',
  scale: {
    mode: Phaser.Scale.FIT,
    height: 725 + levelNumber*250,
    width: 725 + levelNumber*250,
    autoCenter: Phaser.Scale.CENTER_BOTH
  },
  scene: {
    preload,
    create,
    update,
  },
  physics: {
    default: 'arcade',
    arcade: {
      gravity: { n: 500 },
      debug: false,
    },
  }
};

const game = new Phaser.Game(config);
localStorage.clear();


function preload() {
  this.load.image('background', '../../../maze_game/src/assets/images/background.png');
  this.load.image('spike', '../../../maze_game/src/assets/images/spike.png');
  this.load.atlas('player', '../../../maze_game/src/assets/images/kenney_player.png','../../../maze_game/src/assets/images/kenney_player_atlas.json');
  this.load.image('tiles', '../../../maze_game/src/assets/tilesets/platformPack_tilesheet.png');

  if(jsonLevel == null){

  }

  this.load.tilemapTiledJSON('map', '../../../maze_game/src/assets/tilemaps/' +jsonLevel);

}

var timeText = 0;
function create()
{

const map = this.make.tilemap({ key: 'map' });
const tileset = map.addTilesetImage('kenney_simple_platformer', 'tiles');
const platforms = map.createStaticLayer('Platforms', tileset, 0, 0);
platforms.setCollisionByExclusion(-1, true);
this.player = this.physics.add.sprite(90, 98, 'player');//this says where he will be placed
this.player.setBounce(0.1);
this.player.setCollideWorldBounds(true);
this.physics.add.collider(this.player, platforms);
this.anims.create({
  key: 'walk',
  frames: this.anims.generateFrameNames('player', {
    prefix: 'robo_player_',
    start: 2,
    end: 3,
  }),
  frameRate: 10,
  repeat: -1
});
this.anims.create({
  key: 'idle',
  frames: [{ key: 'player', frame: 'robo_player_0' }],
  frameRate: 10,
});
this.anims.create({
  key: 'jump',
  frames: [{ key: 'player', frame: 'robo_player_1' }],
  frameRate: 10,
});
this.cursors = this.input.keyboard.createCursorKeys();
this.spikes = this.physics.add.group({
  allowGravity: false,
  immovable: true
});

// Let's get the spike objects, these are NOT sprites
const spikeObjects = map.getObjectLayer('Spikes')['objects'];

// Now we create spikes in our sprite group for each object in our map
spikeObjects.forEach(spikeObject => {
  // Add new spikes to our sprite group, change the start y position to meet the platform
  const spike = this.spikes.create(spikeObject.x, spikeObject.y + 200 - spikeObject.height, 'spike').setOrigin(0, 0);
});
this.spikes = this.physics.add.group({
  allowGravity: false,
  immovable: true
});

// Let's get the spike objects, these are NOT sprites
spikeObjects.forEach(spikeObject => {
  const spike = this.spikes.create(spikeObject.x, spikeObject.y + 200 - spikeObject.height, 'spike').setOrigin(0, 0);
  spike.body.setSize(spike.width, spike.height - 20).setOffset(0, 20);
});
this.physics.add.collider(this.player, this.spikes, playerHit, null, this);
timeText = this.add.text(10, 10, '', { font: '32px Arial', fill: '#00ff00' });
}

var velX = 0;
var velY = 0;
var acc = 10;
var max = 200;
var startTime = 0;

// Player can jump while walking any direction by pressing the space bar
// or the 'UP' arrow
var finished = false;
function playerHit(player, spike) {
    if(finished){
        return;
    }else{
        finished = true;
    }
    var totalTime = ((new Date()).getTime()- startTime)/1000;
	$(document).ready(function($){
                var resp = $("#response");
                $.ajax({
                    type: "POST",
                    url: "/private_php/connect/levelComplete.php",
                    data: {time_taken: totalTime, level_number: levelNumber },

                    beforeSend: function(xhr){
                        resp.html("Please wait...");
                    },
                    error: function(qXHR, textStatus, errorThrow){
                        resp.html("There are an error");
                    },

                    success: function(data, textStatus, jqXHR){
                        window.location.href = "/pages/level-completed?level_number="+levelNumber + "&time_taken="+totalTime;
                    }
                });
            });
	//window.location.reload();
}
function update() {
  if(!this.cursors.up.isDown && !this.cursors.left.isDown && !this.cursors.right.isDown && !this.cursors.down.isDown){
    velX*=.9;
    velY*=.9;
    //this.player.play('idle', true);
  }else if (startTime==0){
      startTime = (new Date()).getTime();
  }
  if(startTime == 0){
    timeText.setText("TIME : " + 0 + " Seconds (move to start)");
  }else{
    timeText.setText("TIME : " + ((new Date()).getTime()- startTime)/1000 + " Seconds");
  }
  if (this.cursors.left.isDown) {
    velX-=acc;
  }
  if (this.cursors.right.isDown) {
    velX+=acc;
  }
 if (this.cursors.down.isDown) {
    velY+=acc;
  }
 if (this.cursors.up.isDown){
    velY-=acc;
  }
  if( Math.sqrt(velX*velX + velY*velY) > max){
      var vel = Math.sqrt(velX*velX + velY*velY);
      
      velX = velX * (max/vel);
      velY = velY * (max/vel);
  }
  
    this.player.setVelocityX(velX);
    this.player.setVelocityY(velY);



  // Player can jump while walking any direction by pressing the space bar
  // or the 'UP' arrow
/*  if ((this.cursors.space.isDown || this.cursors.up.isDown) && this.player.body.onFloor()) {
    this.player.setVelocityY(-350);
    this.player.play('jump', true);
  }*/
}
